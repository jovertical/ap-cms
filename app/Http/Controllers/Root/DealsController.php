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
use App\Acme\Repositories\{UserRepository, CategoryRepository, ProductRepository};

/**
 * Models
 */
use App\{User, Category, Product, ProductImage};

/**
 * Laravel
 */
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealsController extends Controller
{
	/**
	 * Category Repository
	 * @var object
	 */
	protected $category_repo;

	/**
	 * Product Repository
	 * @var object
	 */
	protected $product_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	CategoryRepository $category_repo,
    	ProductRepository $product_repo,
    	UserRepository $user_repo
    ) {
    	$this->category_repo = $category_repo;
    	$this->product_repo = $product_repo;
    	$this->user_repo = $user_repo;
    }

    public function index()
	{
		return view(user_env().'.deals.index');
	}

	public function datatables()
	{
        return DataTables::of(Product::where('type', 'deal')->get())
            ->rawColumns(['description'])
            ->addColumn('category', function (Product $deal) {
                return optional($deal->category)->toArray();
            })
            ->addColumn('images', function (Product $deal) {
                return optional($deal->images)->toArray();
            })
            ->addColumn('creator', function (Product $deal) {
                return optional($deal->creator)->toArray();
            })
            ->addColumn('updater', function (Product $deal) {
                return optional($deal->updater)->toArray();
            })
            ->addColumn('deleter', function (Product $deal) {
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
                'category_edit_route' => function($deal) {
                    return route(user_env().'.categories.edit', $deal->category);
                },
            ])
            ->make();
	}

	public function create()
	{
        $categories = Category::where('active', 1)->get();

        if (count($categories) == 0) {
            $category_create_route = route(user_env().'.categories.create');

            session()->flash('message', [
                'type' => 'warning',
                'content' => 'There are no categories yet. Create a <a href="'.$category_create_route.'"
                                class="m-link m--font-boldest">category</a> first.'
            ]);
        }

        return view(user_env().'.deals.create', compact('categories'));
	}

	public function store(Request $request)
	{
        $this->validate($request, [
        	'category' => 'required|integer',
            'name' => 'required|max:255|unique:categories,name,NULL,id,deleted_at,NULL',
            'price' => 'required'
        ]);

        try {
            $deal = new Product;
            $deal->type = 'deal';
        	$deal->name = $request->input('name');
        	$deal->price = $request->input('price');
            $deal->description = $request->input('description');
            $deal->featured = $request->filled('featured');

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

	public function edit(Request $request, Product $deal)
	{
		$categories = Category::where('active', 1)->get();

		return view(user_env().'.deals.edit', compact(['categories', 'deal']));
	}

	public function update(Request $request, Product $deal)
	{
        $this->validate($request, [
        	'category' => 'required|integer',
            'name' => "required|max:255|unique:products,name,{$deal->id},id,deleted_at,NULL",
            'price' => 'required'
        ]);

        try {
            $deal->type = 'deal';
        	$deal->category_id = $request->input('category');
        	$deal->name = $request->input('name');
        	$deal->price = $request->input('price');
        	$deal->description = $request->input('description');
            $deal->featured = $request->filled('featured');

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

	public function destroy(Request $request, Product $deal)
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

            Notify::warning('Cannot delete deal.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function toggle(Product $deal)
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

    public function imageIndex(Request $request, Product $deal)
    {
        try {
            $product_images = $deal->images;

            $images = [];

            foreach($product_images as $index => $product_image) {
                $thumbs_directory = $product_image->file_directory.'/thumbnails';

                if (File::exists($thumbs_directory.'/'.$product_image->file_name)) {
                    $file_path = $thumbs_directory.'/'.$product_image->file_name;

                    $images[] = [
                        'directory' => url()->to($thumbs_directory),
                        'name'      => File::name($file_path).'.'.File::extension($file_path),
                        'size'      => File::size($file_path)
                    ];
                }
            }

            return response()->json(['images' => $images]);
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json([]);
    }

    public function imageCreate(Product $deal)
    {
        return view(user_env().'.deals.images', compact('deal'));
    }

    public function imageStore(Request $request, Product $deal)
    {
        try {
            $file_uploader = new FileUploader;
            $file_uploader = $file_uploader->upload(
                $request->file('image'), "deals/{$deal->id}"
            );

            if ($deal->images()->count() < 5) {
                $deal->images()->create([
                    'file_path'         => $file_uploader['file_path'],
                    'file_directory'    => $file_uploader['file_directory'],
                    'file_name'         => $file_uploader['file_name']
                ]);
            }

            return response()->json($file_uploader);
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not uploaded.');
    }

    public function imageDestroy(Request $request, Product $deal)
    {
       try {
            $file_name = $request->input('file_name');

            $product_image =    $deal->images->filter(function($image) use ($file_name) {
                                    return $image->file_name == $file_name;
                                })->first();

            if (File::exists($product_image->file_directory.'/'.$file_name)) {
                File::delete($product_image->file_directory.'/'.$file_name);
            }

            if (File::exists($product_image->file_directory.'/resized/'.$file_name)) {
                File::delete($product_image->file_directory.'/resized/'.$file_name);
            }

            if (File::exists($product_image->file_directory.'/thumbnails/'.$file_name)) {
                File::delete($product_image->file_directory.'/thumbnails/'.$file_name);
            }

            if ($product_image->delete()) {
                return response()->json('File deleted.');
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not deleted.');
    }
}