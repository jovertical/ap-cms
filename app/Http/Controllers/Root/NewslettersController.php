<?php

namespace App\Http\Controllers\Root;

/**
 * Third party
 */
use Carbon, Notify, DataTables;

/**
 * Services
 */
use Setting, FileUploader;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository};

/**
 * Notifications
 */
use App\Notifications\{ResourceCreated, ResourceUpdated, ResourceDeleted};

/**
 * Models
 */
use App\{User, Newsletter};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewslettersController extends Controller
{
	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	UserRepository $user_repo
    ) {
    	$this->user_repo = $user_repo;
    }

    public function index(Request $request)
    {
        return view(user_env().'.newsletters.index');
    }

    public function datatables()
	{
        return DataTables::of(Newsletter::get())
            ->rawColumns(['body'])
            ->addColumn('creator', function (Newsletter $newsletter) {
                return optional($newsletter->creator)->toArray();
            })
            ->addColumn('updater', function (Newsletter $newsletter) {
                return optional($newsletter->updater)->toArray();
            })
            ->addColumn('deleter', function (Newsletter $newsletter) {
                return optional($newsletter->deleter)->toArray();
            })
            ->setRowData([
                'toggle_route' => function($newsletter) {
                    return route(user_env().'.newsletters.toggle', $newsletter);
                },
                'edit_route' => function($newsletter) {
                    return route(user_env().'.newsletters.edit', $newsletter);
                },
                'destroy_route' => function($newsletter) {
                    return route(user_env().'.newsletters.destroy', $newsletter);
                }
            ])
            ->make();
    }
    
	public function create()
	{
        return view(user_env().'.newsletters.create');
    }

	public function store(Request $request)
	{
        $this->validate($request, [
            'trigger' => 'required|string',
            'title' => 'required|max:255',
            'body' 	=> 'required|max:510',
            'attachment' => 'file:1|max:2048'
        ]);

        try {
        	$newsletter = new Newsletter;
            $newsletter->trigger = $request->input('trigger');
            $newsletter->frequency = $request->input('frequency');
        	$newsletter->title = $request->input('title');
            $newsletter->body = $request->input('body');
            
            if ($request->hasFile('attachment')) {
                $file_uploader = new FileUploader;
                $file_uploader = $file_uploader->upload(
                    $request->file('attachment'), "newsletters/{$newsletter->id}"
                );

                $newsletter->file_path = $file_uploader['file_path'];
                $newsletter->file_directory = $file_uploader['file_directory'];
                $newsletter->file_name = $file_uploader['file_name'];
            }

        	if ($newsletter->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($newsletter) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $newsletter,
                            route(user_env('newsletters.edit'), $newsletter),
                            'title'
                        )
                    );
                });

                Notify::success('Newsletter created.', 'Success!');

                return redirect()->route(
                    user_env().'.newsletters.index'
                );
        	}

            Notify::warning('Cannot create a newsletter.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }
    
	public function edit(Request $request, Newsletter $newsletter)
	{
		return view(user_env().'.newsletters.edit', compact('newsletter'));
	}

    public function update(Request $request, Newsletter $newsletter)
	{
        $this->validate($request, [
            'trigger' => 'required|string',
            'title' => 'required|max:255',
            'body' 	=> 'required|max:510',
            'attachment' => 'file:1|max:2048'
        ]);

        try {
            $newsletter->trigger = $request->input('trigger');
            $newsletter->frequency = $request->input('frequency');
        	$newsletter->title = $request->input('title');
        	$newsletter->body = $request->input('body');

            if ($request->hasFile('attachment')) {
                $file_uploader = new FileUploader;
                $file_uploader = $file_uploader->upload(
                    $request->file('attachment'), "newsletters/{$newsletter->id}"
                );

                $newsletter->file_path = $file_uploader['file_path'];
                $newsletter->file_directory = $file_uploader['file_directory'];
                $newsletter->file_name = $file_uploader['file_name'];
            }

        	if ($newsletter->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($newsletter) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $newsletter,
                            route(user_env().'.newsletters.edit', $newsletter),
                            'title'
                        )
                    );
                });

                Notify::success('Newsletter updated.', 'Success!');

                return redirect()->route(
                    user_env().'.newsletters.index'
                );
        	}

            Notify::warning('Cannot update newsletter.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

	public function destroy(Request $request, Newsletter $newsletter)
	{
        try {
            if ($newsletter->delete()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($newsletter) {
                    $notifiable->notify(
                        new ResourceDeleted(
                            auth()->user(), $newsletter, null, 'title'
                        )
                    );
                });

                Notify::success('Newsletter deleted.', 'Success!');

                return back();
            }

            Notify::warning('Cannot delete newsletter', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }
    
    public function toggle(Newsletter $newsletter)
    {
        try {
            $active = $newsletter->active ? 0 : 1;
            $newsletter->active = $active;            

            if ($newsletter->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($newsletter) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $newsletter,
                            route(user_env().'.newsletters.edit', $newsletter)
                        )
                    );
                });

                Notify::success('Newsletter toggled.', 'Success!');

                return back();
            }

            Notify::warning('Cannot toggle newsletter', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }
}
