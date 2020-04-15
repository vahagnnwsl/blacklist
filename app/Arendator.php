<?php

namespace App;

use App\Services\FileUploaderService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arendator extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return  $this->first_name .' '.$this->last_name.' '.$this->patronymic;
    }


    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {

            $violations = json_decode(request()->get('violations'));

            foreach ($violations as $violation) {
                $violation->arendator_id = $model->id;
                ArendatorViolation::create((array)$violation);
            }

            if (request()->hasFile('document')) {
                $doc = FileUploaderService::arendatorFile(request()->file('document'));
                $doc['arendator_id'] = $model->id;
                ArendatorFile::create($doc);
            }

        });
    }

}
