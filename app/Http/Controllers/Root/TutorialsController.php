<?php

namespace App\Http\Controllers\Root;

/**
 * Third party
 */
use Carbon, Notify, DataTables;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, TutorialRepository, ProductRepository};

/**
 * Notifications
 */
use App\Notifications\{ResourceCreated, ResourceUpdated, ResourceDeleted};

/**
 * Models
 */
use App\{User, Tutorial, Episode};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorialsController extends Controller
{
    /**
     * Product Repository
     * @var object
     */
    protected $product_repo;

	/**
	 * Tutorial Repository
	 * @var object
	 */
	protected $tutorial_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
        ProductRepository $product_repo,
        TutorialRepository $tutorial_repo,
    	UserRepository $user_repo
    ) {
        $this->product_repo = $product_repo;
    	$this->tutorial_repo = $tutorial_repo;
    	$this->user_repo = $user_repo;
    }

	public function index()
	{
		return view(user_env('tutorials.index'));
	}

	public function datatables()
	{
        return DataTables::of(Tutorial::get())
            ->rawColumns(['body'])
            ->addColumn('episodes', function (Tutorial $tutorial) {
                return $tutorial->episodes->toArray();
            })
            ->addColumn('creator', function (Tutorial $tutorial) {
                return optional($tutorial->creator)->toArray();
            })
            ->addColumn('updater', function (Tutorial $tutorial) {
                return optional($tutorial->updater)->toArray();
            })
            ->addColumn('deleter', function (Tutorial $tutorial) {
                return optional($tutorial->deleter)->toArray();
            })
            ->setRowData([
                'toggle_route' => function($tutorial) {
                    return route(user_env('tutorials.toggle'), $tutorial);
                },
                'edit_route' => function($tutorial) {
                    return route(user_env('tutorials.edit'), $tutorial);
                },
                'destroy_route' => function($tutorial) {
                    return route(user_env('tutorials.destroy'), $tutorial);
                },
                'episode_create_route' => function($tutorial) {
                    return route(user_env('episodes.create')).'?tutorial='.$tutorial->id;
                }
            ])
            ->make();
	}

	public function create()
	{
        $products = $this->product_repo->get();

        if (count($products) == 0) {
            $product_create_route = route(user_env().'.products.create');

            session()->flash('message', [
                'type' => 'warning',
                'content' => 'There are no products yet. Create a <a href="'.$product_create_route.'"
                                class="m-link m--font-boldest">product</a> first.'
            ]);
        }

        return view(user_env('tutorials.create'), compact('products'));
	}

	public function store(Request $request)
	{
        $this->validate($request, [
            'product' => 'required|integer',
            'title' => 'required|max:255|unique:tutorials',
            'body' 	=> 'required|max:510'
        ]);

        try {
        	$tutorial = new Tutorial;
            $tutorial->product_id = $request->input('product');
        	$tutorial->title = $request->input('title');
        	$tutorial->body = $request->input('body');

        	if ($tutorial->save()) {
                $tutorial->slug = str_replace(' ', '-', $request->input('title'));
                $tutorial->save();

                $this->user_repo->superusers()->each(function($notifiable) use ($tutorial) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $tutorial,
                            route(user_env('tutorials.edit'), $tutorial),
                            'title'
                        )
                    );
                });

                Notify::success('Tutorial created.', 'Success!');

                return redirect()->route(
                    user_env('tutorials.index')
                );
        	}

            Notify::warning('Cannot create a tutorial.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function edit(Request $request, Tutorial $tutorial)
	{
        $products = $this->product_repo->get();

		return view(user_env('tutorials.edit'), compact(['tutorial', 'products']));
	}

	public function update(Request $request, Tutorial $tutorial)
	{
        $this->validate($request, [
            'title' => "required|max:255|unique:tutorials,title,{$tutorial->id},id,deleted_at,NULL",
            'body'  => 'required'
        ]);

        try {
        	$tutorial->title = $request->input('title');
        	$tutorial->body = $request->input('body');

        	if ($tutorial->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($tutorial) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $tutorial,
                            route(user_env('tutorials.edit'), $tutorial),
                            'title'
                        )
                    );
                });

                Notify::success('Tutorial updated.', 'Success!');

                return redirect()->route(
                    user_env('tutorials.index')
                );
        	}

            Notify::warning('Cannot update tutorial.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function destroy(Request $request, Tutorial $tutorial)
	{
        try {
            if ($tutorial->delete()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($tutorial) {
                    $notifiable->notify(
                        new ResourceDeleted(
                            auth()->user(), $tutorial, null, 'title'
                        )
                    );
                });

                Notify::success('Tutorial deleted.', 'Success!');

                return back();
            }

            Notify::warning('Cannot delete tutorial', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

    public function toggle(Tutorial $tutorial)
    {
        try {
            $published = $tutorial->published ? 0 : 1;
            $tutorial->published = $published;            

            if ($tutorial->save()) {
                $tutorial->episodes->map(function ($episode) use ($published) {
                    $episode->published = $published;
                    $episode->save();
                });

                $this->user_repo->superusers()->each(function($notifiable) use ($tutorial) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $tutorial,
                            route(user_env('tutorials.edit'), $tutorial)
                        )
                    );
                });

                Notify::success('Tutorial toggled.', 'Success!');

                return back();
            }

            Notify::warning('Cannot toggle tutorial', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

}