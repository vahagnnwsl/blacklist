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

    public static function arendatorFile($file): array
    {

        $imageFileName = time() . '-' . rand(1, 999999999);
        $mimeType = explode("/", mime_content_type($file))[1];

        $s3 = Storage::disk();
        $filePath = '/public/arendator/' . $imageFileName.'.'.$mimeType;
        $s3->put($filePath, file_get_contents($file), 'public');

        return [
             'path' => '/arendator/' . $imageFileName.'.'.$mimeType,
             'mime_type' => $mimeType
        ];

    }

}
