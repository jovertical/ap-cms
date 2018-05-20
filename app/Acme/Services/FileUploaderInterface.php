<?php

namespace App\Acme\Services;

interface FileUploaderInterface 
{
    public function upload($file, $path);
}
