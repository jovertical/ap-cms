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
 * Notifications
 */
use App\Notifications\{ResourceCreated, ResourceUpdated, ResourceDeleted};

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, CategoryRepository};

/**
 * Models
 */
use App\{User, Category};

/**
 * Laravel
 */
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
	/**
	 * Category Repository
	 * @var object
	 */
	protected $category_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	CategoryRepository $category_repo,
    	UserRepository $user_repo
    ) {
    	$this->category_repo = $category_repo;
    	$this->user_repo = $user_repo;
    }

    public function index()
	{
		return view(user_env().'.categories.index');
	}

	public function datatables()
	{
        return DataTables::of(Category::get())
            ->rawColumns(['description'])
            ->addColumn('products', function (Category $category) {
                return $category->products->toArray();
            })
            ->addColumn('creator', function (Category $category) {
                return optional($category->creator)->toArray();
            })
            ->addColumn('updater', function (Category $category) {
                return optional($category->updater)->toArray();
            })
            ->addColumn('deleter', function (Category $category) {
                return optional($category->deleter)->toArray();
            })
            ->setRowData([
                'toggle_route' => function($category) {
                    return route(user_env().'.categories.toggle', $category);
                },
                'edit_route' => function($category) {
                    return route(user_env().'.categories.edit', $category);
                },
                'destroy_route' => function($category) {
                    return route(user_env().'.categories.destroy', $category);
                },
                'image_route' => function($category) {
                    return route(user_env().'.categories.images.create', $category);
                },
                'product_create_route' => function($category) {
                    return route(user_env().'.products.create').'?category='.$category->id;
                }
            ])
            ->make();
	}

	public function create()
	{
        return view(user_env().'.categories.create');
	}

	public function store(Request $request)
	{
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,NULL,id,deleted_at,NULL',
            'description' => 'max:510'
        ]);

        try {
        	$category = new Category;
        	$category->name = $request->input('name');
        	$category->description = $request->input('description');

        	if ($category->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($category) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $category,
                            route(user_env().'.categories.edit', $category)
                        )
                    );
                });

                Notify::success('Category created.', 'Success!');

                return redirect()->route(user_env().'.categories.images.create', $category);
        	}

            Notify::warning('Cannot create a category.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function edit(Request $request, Category $category)
	{
		return view(user_env().'.categories.edit', compact('category'));
	}

	public function update(Request $request, Category $category)
	{
        $this->validate($request, [
            'name' => "required|max:255|unique:categories,name,{$category->id},id,deleted_at,NULL",
            'description' => 'max:510'
        ]);

        try {
        	$category->name = $request->input('name');
        	$category->description = $request->input('description');

        	if ($category->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($category) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $category,
                            route(user_env().'.categories.edit', $category)
                        )
                    );
                });

                Notify::success('Category updated.', 'Success!');

                return redirect()->route(user_env().'.categories.index');
        	}

            Notify::warning('Cannot update category.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function destroy(Request $request, Category $category)
	{
        try {
            if ($category->delete()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($category) {
                    $notifiable->notify(
                        new ResourceDeleted(
                            auth()->user(), $category, null
                        )
                    );
                });

                Notify::success('Category deleted.', 'Success!');

                return back();
            }

            Notify::warning('Cannot delete category.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
	}

	public function toggle(Category $category)
    {
        try {
            $active = $category->active ? 0 : 1;
            $category->active = $active;

            if ($category->save()) {
                $category->products->map(function ($product) use ($active) {
                    $product->active = $active;
                    $product->save();
                });

                $this->user_repo->superusers()->each(function($notifiable) use ($category) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $category,
                            route(user_env().'.categories.edit', $category)
                        )
                    );
                });

                Notify::success('Category toggled.', 'Success!');

                return back();
            }

            Notify::warning('Cannot toggle category.', 'Whooopss!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }

    public function imageIndex(Request $request, Category $category)
    {
        $directory = $category->file_directory.'/thumbnails';

        if (File::exists($directory.'/'.$category->file_name)) {
            $file_path = $directory.'/'.$category->file_name;

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

    public function imageCreate(Category $category)
    {
        return view(user_env().'.categories.images', compact('category'));
    }

    public function imageStore(Request $request, Category $category)
    {
        try {
            $file_uploader = new FileUploader;
            $file_uploader = $file_uploader->upload(
                $request->file('image'), "categories/{$category->id}"
            );

            $category->file_path = $file_uploader['file_path'];
            $category->file_directory = $file_uploader['file_directory'];
            $category->file_name = $file_uploader['file_name'];

            if ($category->save()) {
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
            $file_name = $request->input('file_name');

            if (File::exists($category->file_directory.'/'.$file_name)) {
                File::delete($category->file_directory.'/'.$file_name);
            }

            if (File::exists($category->file_directory.'/resized/'.$file_name)) {
                File::delete($category->file_directory.'/resized/'.$file_name);
            }

            if (File::exists($category->file_directory.'/thumbnails/'.$file_name)) {
                File::delete($category->file_directory.'/thumbnails/'.$file_name);
            }

            $category->file_path = null;
            $category->file_directory = null;
            $category->file_name = null;

            if ($category->save()) {
                return response()->json('File deleted.');
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not deleted.');
    }
}