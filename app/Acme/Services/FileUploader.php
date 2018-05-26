<?php

namespace App\Acme\Services;

use File, Image;
use App\Acme\Services\FileUploaderInterface;

class FileUploader implements FileUploaderInterface
{
    public function upload($file, $directory)
    {
        $file_ext = $file->getClientOriginalExtension();
        $file_name = create_filename($file_ext);
        $resized = ['height' => 500, 'width' => 500];
        $thumbnail = ['height' => 500, 'width' => 500];

        $base_directory = 'storage/'.$directory;
        $thumbs_directory = $base_directory.'/thumbnails';
        $resized_directory = $base_directory.'/resized';

        if (! File::exists($base_directory)) {
            File::makeDirectory($base_directory, $mode = 0777, true, true);
        }

        if (! File::exists($resized_directory)) {
            File::makeDirectory($resized_directory, $mode = 0777, true, true);
        }

        if (! File::exists($thumbs_directory)) {
            File::makeDirectory($thumbs_directory, $mode = 0777, true, true);
        }

        $path = $file->move($base_directory, $file_name);

        if (in_array($file_ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            Image::make($base_directory.'/'.$file_name)
                ->widen($resized['width'])
                ->heighten($resized['height'])
                ->save($resized_directory.'/'.$file_name, 95);

            Image::make($base_directory.'/'.$file_name)
                ->widen($resized['width'])
                ->heighten($resized['height'])
                ->crop($thumbnail['width'], $thumbnail['height'])
                ->save($thumbs_directory.'/'.$file_name, 95);
        }

        return [
            'file_path' => url($path),
            'file_directory' => $base_directory,
            'file_name' => $file_name
        ];
    }
}