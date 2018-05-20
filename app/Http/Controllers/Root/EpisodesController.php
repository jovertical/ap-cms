<?php

namespace App\Http\Controllers\Root;

/**
 * Third party
 */
use Carbon, Notify, DataTables;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, TutorialRepository, EpisodeRepository};

/**
 * App
 */
use App\Notifications\{ResourceCreated, ResourceUpdated, ResourceDeleted};
use App\{User, Episode};
use App\Http\Controllers\Controller;

/**
 * Laravel
 */
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
	/**
	 * Tutorial Repository
	 * @var object
	 */
	protected $tutorial_repo;

	/**
	 * Episode Repository
	 * @var object
	 */
	protected $episode_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	TutorialRepository $tutorial_repo,
    	EpisodeRepository $episode_repo,
    	UserRepository $user_repo
    ) {
    	$this->tutorial_repo = $tutorial_repo;
    	$this->episode_repo = $episode_repo;
    	$this->user_repo = $user_repo;
    }

	public function index()
	{
		return view(user_env('episodes.index'));
	}

	public function datatables()
	{
        return DataTables::of(Episode::latest())
            ->rawColumns(['body'])
	        ->addColumn('tutorial', function (Episode $episode) {
				return $episode->tutorial->toArray();
			})
            ->addColumn('creator', function (Episode $episode) {
                return optional($episode->creator)->toArray();
            })
            ->addColumn('updater', function (Episode $episode) {
                return optional($episode->updater)->toArray();
            })
            ->addColumn('deleter', function (Episode $episode) {
                return optional($episode->deleter)->toArray();
            })
	        ->setRowData([
	            'edit_route' => function($episode) {
	                return route(user_env('episodes.edit'), $episode);
	            },
	            'destroy_route' => function($episode) {
	                return route(user_env('episodes.destroy'), $episode);
	            },
                'tutorial_edit_route' => function($episode) {
                    return route(user_env('tutorials.edit'), $episode->tutorial);
                },
	        ])
	        ->make();
	}

	public function create()
	{
		$tutorials = $this->tutorial_repo->active();

        if (count($tutorials) == 0) {
            $tutorial_create_route = route(user_env('tutorials.create'));

            session()->flash('message', [
                'type' => 'warning',
                'content' => 'There are no tutorials yet. Create a <a href="'.$tutorial_create_route.'"
                                class="m-link m--font-boldest">tutorial</a> first.'
            ]);
        }

        return view(user_env('episodes.create'), compact('tutorials'));
	}

	public function store(Request $request)
	{
        $tutorial_id = $request->input('tutorial');

        $this->validate($request, [
            'tutorial' 	=> 'required',
            'number' => "required|integer|unique:episodes,number,NULL,id,tutorial_id,{$tutorial_id},deleted_at,NULL",
            'title' => "required|max:255|unique:episodes,title,NULL,id,tutorial_id,{$tutorial_id},deleted_at,NULL",
            'body' 	=> 'required'
        ]);

        try {
        	$episode = new Episode;
        	$episode->tutorial_id = $tutorial_id;
            $episode->number = $request->input('number');
        	$episode->title = $request->input('title');
        	$episode->body = $request->input('body');
        	$episode->video_url = $request->input('video_url');

        	if ($episode->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($episode) {
                    $notifiable->notify(
                        new ResourceCreated(
                        	auth()->user(),
                            $episode,
                            route(user_env('episodes.edit'), $episode),
                            'title'
                        )
                    );
                });

                Notify::success('Episode created.', 'Success!');

                return redirect()->route(
                    user_env('episodes.index')
                );
        	}

            Notify::warning('Cannot create an episode.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

    public function edit(Request $request, Episode $episode)
    {
        $tutorials = $this->tutorial_repo->get();

        return view(user_env('episodes.edit'), compact(['tutorials', 'episode']));
    }

    public function update(Request $request, Episode $episode)
    {
        $this->validate($request, [
            'tutorial' => 'required',
            'number' => "required|integer|unique:episodes,number,{$episode->id},id,tutorial_id,{$episode->tutorial_id},deleted_at,NULL",
            'title' => "required|max:255|unique:episodes,title,{$episode->id},id,tutorial_id,{$episode->tutorial_id},deleted_at,NULL",
            'body'  => 'required'
        ]);

        try {
            $episode->tutorial_id = $request->input('tutorial');
            $episode->number = $request->input('number');
            $episode->title = $request->input('title');
            $episode->body = $request->input('body');
            $episode->video_url = $request->input('video_url');

            if ($episode->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($episode) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $episode,
                            route(user_env('episodes.edit'), $episode),
                            'title'
                        )
                    );
                });

                Notify::success('Episode updated.', 'Success!');

                return redirect()->route(
                    user_env('episodes.index')
                );
            }

            Notify::warning('Cannot update episode.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

    public function destroy(Request $request, Episode $episode)
    {
        try {
            if ($episode->delete()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($episode) {
                    $notifiable->notify(
                        new ResourceDeleted(
                            auth()->user(), $episode, null, 'title'
                        )
                    );
                });

                Notify::success('Episode deleted.', 'Success!');

                return back();
            }

            Notify::warning('Cannot delete episode', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }
}