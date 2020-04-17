<?php

namespace App;

use App\Services\FileUploaderService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Arendator extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name . ' ' . $this->patronymic;
    }
    public function user(){
        return $this->hasOne(User::class);
    }

    public function violations()
    {
        return $this->hasMany(ArendatorViolation::class);
    }



    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {


            foreach (request()->get('violations') as $violation) {

                if (Auth::id()) {
                    $violation['user_id'] = Auth::id();
                }
                if (request()->has('client')) {
                    $violation['client_id'] = request()->get('client')->id;
                }

                $violation['arendator_id'] = $model->id;
                ArendatorViolation::create($violation);
            }

            if (request()->has('document') && request()->get('document') !== null) {
                $doc = FileUploaderService::arendatorFile(request()->get('document'));
                $doc['arendator_id'] = $model->id;
                ArendatorFile::create($doc);
            }

        });
    }

}
