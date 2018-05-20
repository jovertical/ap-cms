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

class ProductsController extends Controller
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
		return view(user_env().'.products.index');
	}

	public function datatables()
	{
        return DataTables::of(Product::get())
            ->rawColumns(['description'])
            ->addColumn('category', function (Product $product) {
                return $product->category->toArray();
            })
            ->addColumn('images', function (Product $product) {
                return $product->images->toArray();
            })
            ->addColumn('creator', function (Product $product) {
                return optional($product->creator)->toArray();
            })
            ->addColumn('updater', function (Product $product) {
                return optional($product->updater)->toArray();
            })
            ->addColumn('deleter', function (Product $product) {
                return optional($product->deleter)->toArray();
            })
            ->setRowData([
                'edit_route' => function($product) {
                    return route(user_env().'.products.edit', $product);
                },
                'destroy_route' => function($product) {
                    return route(user_env().'.products.destroy', $product);
                },
                'toggle_route' => function($product) {
                    return route(user_env().'.products.toggle', $product);
                },
                'image_route' => function($product) {
                    return route(user_env().'.products.images.create', $product);
                },
                'tutorial_create_route' => function($product) {
                    return route(user_env().'.tutorials.create').'?product='.$product->id;
                },
                'category_edit_route' => function($product) {
                    return route(user_env().'.categories.edit', $product->category);
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

        return view(user_env('products.create'), compact('categories'));
	}

	public function store(Request $request)
	{
        $this->validate($request, [
        	'category' => 'required|integer',
            'name' => 'required|max:255|unique:categories,name,NULL,id,deleted_at,NULL',
            'price' => 'required',
            'description' => 'max:510'
        ]);

        try {
        	$product = new Product;
        	$product->category_id = $request->input('category');
        	$product->name = $request->input('name');
        	$product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->featured = $request->filled('featured');

        	if ($product->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($product) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $product,
                            route(user_env().'.products.edit', $product)
                        )
                    );
                });

                Notify::success('Product created.', 'Success!');

                return redirect()->route(user_env().'.products.images.create', $product);
        	}

            Notify::warning('Cannot create a product.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function edit(Request $request, Product $product)
	{
		$categories = Category::where('active', 1)->get();

		return view(user_env().'.products.edit', compact(['categories', 'product']));
	}

	public function update(Request $request, Product $product)
	{
        $this->validate($request, [
        	'category' => 'required|integer',
            'name' => "required|max:255|unique:products,name,{$product->id},id,deleted_at,NULL",
            'price' => 'required',
            'description' => 'max:510'
        ]);

        try {
        	$product->category_id = $request->input('category');
        	$product->name = $request->input('name');
        	$product->price = $request->input('price');
        	$product->description = $request->input('description');
            $product->featured = $request->filled('featured');

        	if ($product->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($product) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $product,
                            route(user_env().'.products.edit', $product)
                        )
                    );
                });

                Notify::success('Product updated.', 'Success!');

                return redirect()->route(user_env().'.products.index');
        	}

            Notify::warning('Cannot update product.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function destroy(Request $request, Product $product)
	{
        try {
            if ($product->delete()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($product) {
                    $notifiable->notify(
                        new ResourceDeleted(
                            auth()->user(), $product, null
                        )
                    );
                });

                Notify::success('Product deleted.', 'Success!');

                return back();
            }

            Notify::warning('Cannot delete product.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function toggle(Product $product)
    {
        try {
            $product->active = $product->active ? 0 : 1;

            if ($product->save()) {
                Notify::success('Product toggled.', 'Success!');

                $this->user_repo->superusers()->each(function($notifiable) use ($product) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $product,
                            route(user_env().'.products.edit', $product)
                        )
                    );
                });

                return back();
            }

            Notify::warning('Cannot toggle product.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

    public function imageIndex(Request $request, Product $product)
    {
        try {
            $product_images = $product->images;

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

    public function imageCreate(Product $product)
    {
        return view(user_env().'.products.images', compact('product'));
    }

    public function imageStore(Request $request, Product $product)
    {
        try {
            $file_uploader = new FileUploader;
            $file_uploader = $file_uploader->upload(
                $request->file('image'), "products/{$product->id}"
            );

            if ($product->images()->count() < 5) {
                $product->images()->create([
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

    public function imageDestroy(Request $request, Product $product)
    {
       try {
            $file_name = $request->input('file_name');

            $product_image =    $product->images->filter(function($image) use ($file_name) {
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