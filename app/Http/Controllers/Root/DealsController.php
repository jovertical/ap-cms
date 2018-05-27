<?php

namespace App\Http\Controllers\Root;

/**
 * Third party
 */
use Carbon, Notify, DataTables;

/**
 * Notifications
 */
use App\Notifications\{ResourceCreated, ResourceUpdated, ResourceDeleted};

/**
 * Services
 */
use Setting, FileUploader;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, DealRepository};

/**
 * Models
 */
use App\{User, Deal};

/**
 * Laravel
 */
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealsController extends Controller
{
	
	protected $deal_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	DealRepository $deal_repo,
    	UserRepository $user_repo
    ) {
    	$this->deal_repo = $deal_repo;
    	$this->user_repo = $user_repo;
    }

    public function index()
	{
		return view(user_env().'.deals.index');
	}

	public function datatables()
	{
        return DataTables::of(Deal::get())
            ->rawColumns(['description','name'])
            ->addColumn('images', function (Deal $deal) {
                return optional($deal->images)->toArray();
            })
            ->addColumn('creator', function (Deal $deal) {
                return optional($deal->creator)->toArray();
            })
            ->addColumn('updater', function (Deal $deal) {
                return optional($deal->updater)->toArray();
            })
            ->addColumn('deleter', function (Deal $deal) {
                return optional($deal->deleter)->toArray();
            })
            ->setRowData([
                'edit_route' => function($deal) {
                    return route(user_env().'.deals.edit', $deal);
                },
                'destroy_route' => function($deal) {
                    return route(user_env().'.deals.destroy', $deal);
                },
                'toggle_route' => function($deal) {
                    return route(user_env().'.deals.toggle', $deal);
                },
                'image_route' => function($deal) {
                    return route(user_env().'.deals.images.create', $deal);
               },
            ])
            ->make();
	}
   
	public function store(Request $request)
	{
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,NULL,id,deleted_at,NULL',
            'price' => 'required'
        ]);

        try {
        	$deal = new Deal;
        	$deal->name = $request->input('name');
        	$deal->price = $request->input('price');
            $deal->description = $request->input('description');

        	if ($deal->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($deal) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $deal,
                            route(user_env().'.deals.edit', $deal)
                        )
                    );
                });

                Notify::success('Deal created.', 'Success!');

                return redirect()->route(user_env().'.deals.images.create', $deal);
        	}

            Notify::warning('Cannot create a deal.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	
    public function edit(Request $request, Deal $deal)
    {

        return view(user_env().'.deals.edit', compact('deal'));
    }

	public function update(Request $request, Deal $deal)
	{
        $this->validate($request, [
            'name' => "required|max:255|unique:deals,name,{$deal->id},id,deleted_at,NULL",
            'price' => 'required'
        ]);

        try {
        	$deal->name = $request->input('name');
        	$deal->price = $request->input('price');
        	$deal->description = $request->input('description');

        	if ($deal->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($deal) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $deal,
                            route(user_env().'.deals.edit', $deal)
                        )
                    );
                });

                Notify::success('Deal updated.', 'Success!');

                return redirect()->route(user_env().'.deals.index');
        	}

            Notify::warning('Cannot update deal.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function destroy(Request $request, Deal $deal)
	{
        try {
            if ($deal->delete()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($deal) {
                    $notifiable->notify(
                        new ResourceDeleted(
                            auth()->user(), $deal, null
                        )
                    );
                });

                Notify::success('Deal deleted.', 'Success!');

                return back();
            }

            Notify::warning('Cannot delete Deal.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function toggle(Deal $deal)
    {
        try {
            $deal->active = $deal->active ? 0 : 1;

            if ($deal->save()) {
                Notify::success('Deal toggled.', 'Success!');

                $this->user_repo->superusers()->each(function($notifiable) use ($deal) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $deal,
                            route(user_env().'.deals.edit', $deal)
                        )
                    );
                });

                return back();
            }

            Notify::warning('Cannot toggle deal.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

 public function imageIndex(Request $request, Deal $deal)
    {
        $directory = $deal->file_directory.'/thumbnails';

        if (File::exists($directory.'/'.$deal->file_name)) {
            $file_path = $directory.'/'.$deal->file_name;

            $images = [
                [
                    'directory' => url()->to($directory),
                    'name'      => File::name($file_path).'.'.File::extension($file_path),
                    'size'      => File::size($file_path)
                ]
            ];

            return response()->json(compact('images'));
        }

        return response()->json('No image.');
    }

    public function imageCreate(Deal $deal)
    {
        return view(user_env().'.deals.images', compact('deal'));
    }

    public function imageStore(Request $request, Deal $deal)
    {
        try {
            $file_uploader = new FileUploader;
            $file_uploader = $file_uploader->upload(
                $request->file('image'), "deals/{$deal->id}"
            );

            $deal->file_path = $file_uploader['file_path'];
            $deal->file_directory = $file_uploader['file_directory'];
            $deal->file_name = $file_uploader['file_name'];

            if ($deal->save()) {
                return response()->json($file_uploader);
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not uploaded.');
    }

    public function imageDestroy(Request $request, Category $category)
    {
       try {
            $file_name = $requestdeals->input('file_name');

            if (File::exists($deal->file_directory.'/'.$file_name)) {
                File::delete($deal->file_directory.'/'.$file_name);
            }

            if (File::exists($deal->file_directory.'/resized/'.$file_name)) {
                File::delete($deal->file_directory.'/resized/'.$file_name);
            }

            if (File::exists($deal->file_directory.'/thumbnails/'.$file_name)) {
                File::delete($deal->file_directory.'/thumbnails/'.$file_name);
            }

            $deal->file_path = null;
            $deal->file_directory = null;
            $category->file_name = null;

            if ($deal->save()) {
                return response()->json('File deleted.');
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not deleted.');
    }
}