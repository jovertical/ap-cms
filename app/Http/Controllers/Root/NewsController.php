<?php
namespace App\Http\Controllers\Root;

/**
 * Third party
 */
use Carbon, Notify, DataTables;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, NewsRepository, ProductRepository};

/**
 * Notifications
 */
use App\Notifications\{ResourceCreated, ResourceUpdated, ResourceDeleted};

/**
 * Models
 */
use App\{User, News, Episode};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Product Repository
     * @var object
     */
    protected $product_repo;

    /**
     * News Repository
     * @var object
     */
    protected $news_repo;

    /**
     * User Repository
     * @var object
     */
    protected $user_repo;

    public function __construct(
        
        NewsRepository $news_repo,
        UserRepository $user_repo
    ) {
        $this->news_repo = $news_repo;
        $this->user_repo = $user_repo;
    }

    public function index()
    {
        return view(user_env('news.index'));
    }

    public function datatables()
    {
        return DataTables::of(News::get())
            ->rawColumns(['body'])
            ->addColumn('creator', function (News $news) {
                return optional($news->creator)->toArray();
            })
            ->addColumn('updater', function (News $news) {
                return optional($news->updater)->toArray();
            })
            ->addColumn('deleter', function (News $news) {
                return optional($news->deleter)->toArray();
            })
            ->setRowData([
                'toggle_route' => function($news) {
                    return route(user_env('news.toggle'), $news);
                },
                'edit_route' => function($news) {
                    return route(user_env('news.edit'), $news);
                },
                'destroy_route' => function($news) {
                    return route(user_env('news.destroy'), $news);
                },
                'episode_create_route' => function($news) {
                    return route(user_env('episodes.create')).'?news='.$news->id;
                }
            ])
            ->make();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:tutorials',
            'body'  => 'required|max:510'
        ]);

        try {
            $news = new news;
            $news->title = $request->input('title');
            $news->body = $request->input('body');

            if ($news->save()) {
                $news->slug = str_replace(' ', '-', $request->input('title'));
                $news->save();

                $this->user_repo->superusers()->each(function($notifiable) use ($news) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $news,
                            route(user_env('news.edit'), $news),
                            'title'
                        )
                    );
                });

                Notify::success('news created.', 'Success!');

                return redirect()->route(
                    user_env('news.index')
                );
            }

            Notify::warning('Cannot create a news.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

    public function create()
    {
        return view(user_env('news.create'));

    }
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title' => "required|max:255|unique:news,title,{$news->id},id,deleted_at,NULL",
            'body'  => 'required'
        ]);

        try {
            $news->title = $request->input('title');
            $news->body = $request->input('body');

            if ($news->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($news) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $news,
                            route(user_env('news.edit'), $news),
                            'title'
                        )
                    );
                });

                Notify::success('News updated.', 'Success!');

                return redirect()->route(
                    user_env('News.index')
                );
            }

            Notify::warning('Cannot update news.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

    public function destroy(Request $request, News $news)
    {
        try {
            if ($news->delete()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($news) {
                    $notifiable->notify(
                        new ResourceDeleted(
                            auth()->user(), $news, null, 'title'
                        )
                    );
                });

                Notify::success('News deleted.', 'Success!');

                return back();
            }

            Notify::warning('Cannot delete News', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

    public function toggle(News $news)
    {
        try {
            $published = $news->published ? 0 : 1;
            $news->published = $published;            

            if ($news->save()) {
                $news->episodes->map(function ($episode) use ($published) {
                    $episode->published = $published;
                    $episode->save();
                });

                $this->user_repo->superusers()->each(function($notifiable) use ($news) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $news,
                            route(user_env('news.edit'), $news)
                        )
                    );
                });

                Notify::success('News toggled.', 'Success!');

                return back();
            }

            Notify::warning('Cannot toggle news', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

}