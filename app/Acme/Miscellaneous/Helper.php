<?php

/**
 * Define miscellaneous helper methods here.
 * This will be autoloaded, therefore it will be accessible globally.
 */

if (! function_exists('user_env')) {
    function user_env($sub_string = null) {
        switch (request()->segment(1)) {
            case 'su':
                    $user_env = 'root';
                break;

            default:
                    $user_env = 'front';
                break;
        }

        if (is_null($sub_string)) {
            return $user_env;
        }

        return $user_env.'.'.$sub_string;
    }
}

if (! function_exists('greet')) {
    function greet() {
        $date_time = date('H:i:s');

        if ($date_time >= '00:00:00' && $date_time < '12:00:00') {
            return 'Goodmorning! Goodluck for the day ahead.';
        } elseif ($date_time >= '12:00:00' && $date_time < '13:00:00') {
            return 'Hello! It is already lunch time.';
        } elseif ($date_time >= '13:00:00' && $date_time < '17:00:00') {
            return 'Goodafternoon!';
        } elseif ($date_time >= '17:00:00' && $date_time < '20:00:00') {
            return 'Hello! It is already dinner time.';
        } elseif ($date_time >= '17:00:00' && $date_time < '24:00:00') {
            return 'Goodevening! Do not forget your sleep.';
        } else {
            return 'Hello!';
        }
    }
}

if (! function_exists('create_slug')) {
    function create_slug() {
        return str_shuffle(
            str_random(15)
        );
    }
}

if (! function_exists('create_random_token')) {
    function create_random_token() {
        return str_shuffle(
            str_random(50)
        );
    }
}

if (! function_exists('create_username')) {
    function create_username(string $email) {
        return substr($email, 0, strrpos($email, '@'));
    }
}

if (! function_exists('create_password')) {
    function create_password() {
        return mt_rand(100000, 999999);
    }
}

if (! function_exists('create_padded_counter')) {
    function create_padded_counter($counter) {
        $length = strlen($counter);

        return str_pad($counter, $length > 4 ? $length : 4, '0', STR_PAD_LEFT);
    }
}

if (! function_exists('create_filename')) {
    function create_filename(string $ext) {
        return str_random(25).'.'.$ext;
    }
}

if (! function_exists('image_url')) {
    function image_url($model, $type = 'thumbnail') {
        if (is_object($model)) {
            if (($model->file_directory != null) && ($model->file_name != null)) {
                switch ($type) {
                    case 'thumbnail':
                            $file_url = "{$model->file_directory}/thumbnails/{$model->file_name}";
                        break;

                    case 'resized':
                            $file_url = "{$model->file_directory}/resized/{$model->file_name}";
                        break;

                    default:
                            $file_url = "{$model->file_directory}/{$model->file_name}";
                        break;
                }

                return url()->to($file_url);
            }
        }

        return url()->to('/root/assets/app/media/img/misc/noimage.png');
    }
}

if (! function_exists('active_menu')) {
    function active_menu($segment_2) {
        $segments = [
            'dashboard' => [null],
            'inventory' => ['categories', 'products'],
            'reservation' => ['reservations'],
            'CMS' => ['tutorials', 'episodes', 'newsletters'],
            'manage' => ['users', 'superusers', 'settings'],
        ];

        foreach ($segments as $index => $segment) {
            if (in_array($segment_2, array_values($segment))) {
                return $index;
            }
        }

        return;
    }
}

if (! function_exists('paginate')) {
    function paginate($data, $perPage = 10) {
        if (is_array($data)) {
            $data = collect($data);
        }

        return new Illuminate\Pagination\LengthAwarePaginator(
            $data->forPage(Illuminate\Pagination\Paginator::resolveCurrentPage(), $perPage),
            $data->count(), $perPage,
            Illuminate\Pagination\Paginator::resolveCurrentPage(),
            ['path' => Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );
    }
}