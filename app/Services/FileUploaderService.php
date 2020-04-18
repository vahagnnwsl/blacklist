<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploaderService
{


    public static function document($file): string
    {

        $imageFileName = time() . '-' . rand(1, 999999999) . '.' . $file->getClientOriginalExtension();
        $s3 = Storage::disk();
        $filePath = '/public/documents/' . $imageFileName;
        $s3->put($filePath, file_get_contents($file), 'public');
        return $imageFileName;

    }

    public static function arendatorViolationFile($file, $type = false): string
    {


        if ($type) {

            $imageFileName = time() . '-' . rand(1, 999999999) . '.' . $file->getClientOriginalExtension();

        }else{
            $mimeType = explode("/", mime_content_type($file))[1];

            $imageFileName = time() . '-' . rand(1, 999999999). '.' . $mimeType;

        }


        $s3 = Storage::disk();
        $filePath = '/public/arendatorViolation/' . $imageFileName ;
        $s3->put($filePath, file_get_contents($file), 'public');

        return '/arendatorViolation/' . $imageFileName ;


    }

}
