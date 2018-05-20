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
use App\Notifications\{LoginCredential, ResourceCreated, ResourceUpdated, ResourceDeleted};

/**
 * Models
 */
use App\{User};

/**
 * Laravel
 */
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperusersController extends Controller
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

    public function index()
    {
        return view(user_env().'.superusers.index');
    }

    public function datatables()
    {
        return DataTables::of($this->user_repo->superusers())
            ->addColumn('creator', function (User $superuser) {
                return optional($superuser->creator)->toArray();
            })
            ->addColumn('updater', function (User $superuser) {
                return optional($superuser->updater)->toArray();
            })
            ->addColumn('deleter', function (User $superuser) {
                return optional($superuser->deleter)->toArray();
            })
            ->setRowData([
            'edit_route' => function($superuser) {
                return route(user_env().'.superusers.edit', $superuser);
            },
            'toggle_route' => function($superuser) {
                return route(user_env().'.superusers.toggle', $superuser);
            },
            'image_route' => function($superuser) {
                return route(user_env().'.superusers.images.create', $superuser);
            }
        ])
        ->make();
    }

    public function create()
    {
        return view(user_env().'.superusers.create');
    }

    public function store(Request $request)
    {
        $username = create_username($request->input('email'));

        $this->validate($request, [
            'email'         => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                function($attribute, $value, $fail) use ($username) {
                    $count = User::where('name', $username)->count();

                    if ($count > 0) {
                        return $fail($attribute.' is invalid.');
                    }
                }
            ],
            'first_name'    => 'required|max:255',
            'middle_name'   => 'max:255',
            'last_name'     => 'required|max:255',
            'birthdate'     => 'max:255',
            'gender'        => 'max:255',
            'address'       => 'max:510',
            'contact_number' => 'max:255'
        ]);

        try {
            $superuser = new User;
            $password = create_password();

            $superuser->verified        = 1;
            $superuser->type            = 'superuser';
            $superuser->name            = $username;
            $superuser->email           = $request->input('email');
            $superuser->password        = bcrypt($password);
            $superuser->first_name      = $request->input('first_name');
            $superuser->middle_name     = $request->input('middle_name');
            $superuser->last_name       = $request->input('last_name');
            $superuser->birthdate       = $request->input('birthdate');
            $superuser->gender          = $request->input('gender');
            $superuser->address         = $request->input('address');
            $superuser->contact_number  = $request->input('contact_number');

            if ($superuser->save()) {
                $superuser->notify(new LoginCredential($superuser, $password));

                $this->user_repo->superusers()->each(function($notifiable) use ($superuser) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $superuser,
                            route('root.superusers.edit', $superuser)
                        )
                    );
                });

                Notify::success('Superuser created.', 'Success!');

                return redirect()->route(
                    user_env('superusers.images.create'), $superuser
                );
            }

            Notify::warning('Cannot create a superuser', 'Ooops?');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Ooops!');
        }

        return back();
    }

    public function edit(User $superuser)
    {
        return view(user_env().'.superusers.edit', compact('superuser'));
    }

    public function update(Request $request, User $superuser)
    {
        $this->validate($request, [
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'max:255',
            'last_name'     => 'required|string|max:255',
            'birthdate'     => 'max:255',
            'gender'        => 'max:255',
            'address'       => 'max:510',
            'contact_number'  => 'max:255'
        ]);

        try {
            $superuser->first_name      = $request->input('first_name');
            $superuser->middle_name     = $request->input('middle_name');
            $superuser->last_name       = $request->input('last_name');
            $superuser->birthdate       = $request->input('birthdate');
            $superuser->gender          = $request->input('gender');
            $superuser->address         = $request->input('address');
            $superuser->contact_number    = $request->input('contact_number');

            if ($superuser->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($superuser) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $superuser,
                            route(user_env('superusers.edit'), $superuser)
                        )
                    );
                });

                Notify::success('Superuser updated.', 'Success!');

                return redirect()->route(
                    user_env('superusers.index')
                );
            }

            Notify::warning('Cannot update superuser', 'Ooops?');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Ooops!');
        }

        return back();
    }

    public function toggle(User $superuser)
    {
        try {
            $superuser->active = $superuser->active ? 0 : 1;

            if ($superuser->save()) {
                $this->user_repo->superusers()->each(function($notifiable) use ($superuser) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $superuser,
                            route(user_env('superusers.edit'), $superuser)
                        )
                    );
                });

                Notify::success('Superuser toggled.', 'Success!');

                return back();
            }

            Notify::warning('Cannot toggle superuser', 'Ooops?');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Ooops!');
        }

        return back();
    }

    public function imageIndex(Request $request, User $superuser)
    {
        $directory = $superuser->file_directory.'/thumbnails';

        if (File::exists($directory.'/'.$superuser->file_name)) {
            $file_path = $directory.'/'.$superuser->file_name;

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

    public function imageCreate(User $superuser)
    {
        return view(user_env('superusers.images'), compact('superuser'));
    }

    public function imageStore(Request $request, User $superuser)
    {
        try {
            $file_uploader = new FileUploader;
            $file_uploader = $file_uploader->upload(
                $request->file('image'), "superusers/{$superuser->id}"
            );

            $superuser->file_path = $file_uploader['file_path'];
            $superuser->file_directory = $file_uploader['file_directory'];
            $superuser->file_name = $file_uploader['file_name'];

            if ($superuser->save()) {
                return response()->json($file_uploader);
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not uploaded.');
    }

    public function imageDestroy(Request $request, User $superuser)
    {
       try {
            $file_name = $request->input('file_name');

            if (File::exists($superuser->file_directory.'/'.$file_name)) {
                File::delete($superuser->file_directory.'/'.$file_name);
            }

            if (File::exists($superuser->file_directory.'/resized/'.$file_name)) {
                File::delete($superuser->file_directory.'/resized/'.$file_name);
            }

            if (File::exists($superuser->file_directory.'/thumbnails/'.$file_name)) {
                File::delete($superuser->file_directory.'/thumbnails/'.$file_name);
            }

            $superuser->file_path = null;
            $superuser->file_directory = null;
            $superuser->file_name = null;

            if ($superuser->save()) {
                return response()->json('File deleted.');
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not deleted.');
    }
}