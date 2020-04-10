<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploaderService {


    public static function document($file)
    {

        $imageFileName =   time() .'-'.rand(1, 999999999). '.' . $file->getClientOriginalExtension();
        $s3 = Storage::disk();
        $filePath = '/public/documents/'. $imageFileName;
        $s3->put($filePath, file_get_contents($file), 'public');
        return  $imageFileName;

    }

}
