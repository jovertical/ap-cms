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

class UsersController extends Controller
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
        return view(user_env().'.users.index');
    }

    public function datatables()
    {
        return DataTables::of(User::where('type', 'user')->get())
            ->addColumn('creator', function (User $user) {
                return optional($user->creator)->toArray();
            })
            ->addColumn('updater', function (User $user) {
                return optional($user->updater)->toArray();
            })
            ->addColumn('deleter', function (User $user) {
                return optional($user->deleter)->toArray();
            })
            ->setRowData([
            'edit_route' => function($user) {
                return route(user_env().'.users.edit', $user);
            },
            'toggle_route' => function($user) {
                return route(user_env().'.users.toggle', $user);
            },
            'image_route' => function($user) {
                return route(user_env().'.users.images.create', $user);
            }
        ])
        ->make();
    }

    public function create()
    {
        return view(user_env().'.users.create');
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
            $user = new User;
            $password = create_password();

            $user->verified        = 1;
            $user->type            = 'user';
            $user->name            = $username;
            $user->email           = $request->input('email');
            $user->password        = bcrypt($password);
            $user->first_name      = $request->input('first_name');
            $user->middle_name     = $request->input('middle_name');
            $user->last_name       = $request->input('last_name');
            $user->birthdate       = $request->input('birthdate');
            $user->gender          = $request->input('gender');
            $user->address         = $request->input('address');
            $user->contact_number  = $request->input('contact_number');

            if ($user->save()) {
                $user->notify(new LoginCredential($user, $password));

                $this->user_repo->users()->each(function($notifiable) use ($user) {
                    $notifiable->notify(
                        new ResourceCreated(
                            auth()->user(),
                            $user,
                            route(user_env().'.users.edit', $user)
                        )
                    );
                });

                Notify::success('Distributor created.', 'Success!');

                return redirect()->route(
                    user_env('users.images.create'), $user
                );
            }

            Notify::warning('Cannot create a distributor.', 'Ooops?');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Ooops!');
        }

        return back();
    }

    public function edit(User $user)
    {
        return view(user_env().'.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
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
            $user->first_name      = $request->input('first_name');
            $user->middle_name     = $request->input('middle_name');
            $user->last_name       = $request->input('last_name');
            $user->birthdate       = $request->input('birthdate');
            $user->gender          = $request->input('gender');
            $user->address         = $request->input('address');
            $user->contact_number    = $request->input('contact_number');

            if ($user->save()) {
                $this->user_repo->users()->each(function($notifiable) use ($user) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $user,
                            route(user_env('users.edit'), $user)
                        )
                    );
                });

                Notify::success('Distributor updated.', 'Success!');

                return redirect()->route(
                    user_env('users.index')
                );
            }

            Notify::warning('Cannot update distributor.', 'Ooops?');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Ooops!');
        }

        return back();
    }

    public function toggle(User $user)
    {
        try {
            $user->active = $user->active ? 0 : 1;

            if ($user->save()) {
                $this->user_repo->users()->each(function($notifiable) use ($user) {
                    $notifiable->notify(
                        new ResourceUpdated(
                            auth()->user(),
                            $user,
                            route(user_env('users.edit'), $user)
                        )
                    );
                });

                Notify::success('Distributor toggled.', 'Success!');

                return back();
            }

            Notify::warning('Cannot toggle distributor.', 'Ooops?');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Ooops!');
        }

        return back();
    }

    public function imageIndex(Request $request, User $user)
    {
        $directory = $user->file_directory.'/thumbnails';

        if (File::exists($directory.'/'.$user->file_name)) {
            $file_path = $directory.'/'.$user->file_name;

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

    public function imageCreate(User $user)
    {
        return view(user_env('users.images'), compact('user'));
    }

    public function imageStore(Request $request, User $user)
    {
        try {
            $file_uploader = new FileUploader;
            $file_uploader = $file_uploader->upload(
                $request->file('image'), "users/{$user->id}"
            );

            $user->file_path = $file_uploader['file_path'];
            $user->file_directory = $file_uploader['file_directory'];
            $user->file_name = $file_uploader['file_name'];

            if ($user->save()) {
                return response()->json($file_uploader);
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not uploaded.');
    }

    public function imageDestroy(Request $request, User $user)
    {
       try {
            $file_name = $request->input('file_name');

            if (File::exists($user->file_directory.'/'.$file_name)) {
                File::delete($user->file_directory.'/'.$file_name);
            }

            if (File::exists($user->file_directory.'/resized/'.$file_name)) {
                File::delete($user->file_directory.'/resized/'.$file_name);
            }

            if (File::exists($user->file_directory.'/thumbnails/'.$file_name)) {
                File::delete($user->file_directory.'/thumbnails/'.$file_name);
            }

            $user->file_path = null;
            $user->file_directory = null;
            $user->file_name = null;

            if ($user->save()) {
                return response()->json('File deleted.');
            }
        } catch(Exception $e) {
            return response()->json($e, 400);
        }

        return response()->json('File not deleted.');
    }
}