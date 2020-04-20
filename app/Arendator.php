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

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function violations()
    {
        return $this->hasMany(ArendatorViolation::class);
    }

    public function getDataAttribute()
    {
        $array = [
            'id' => $this->id,
            'full_name' => $this->fullName,
            'register' => $this->register,
            'address' => $this->address,
            'region' => $this->region,
            'city' => $this->city,
            'company_name' => $this->company_name,
            'inn' => $this->inn,
            'position' => $this->position,
            'passport' => $this->passport_serial . ' ' . $this->passport_number,
            'contact_phone' => $this->contact_phone,
            'birth_date' => $this->birth_date,
            'date' => $this->created_at->format('d/m/Y')
        ];

        $array['violations'] = [];

        foreach ($this->violations as $violation) {
            array_push($array['violations'], [
                'full_name' => $violation->user->full_name,
                'date' => $violation->date,
                'description' => $violation->description,
                'document' => $violation->document,
                'status' => $violation->status,
                'user_id' => $violation->user_id,
                'id' => $violation->id,
            ]);
        }
        return $array;
    }


    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {


            foreach (request()->get('violations') as $violation) {

                if (Auth::check()) {
                    if (Auth::id()) {
                        $violation['user_id'] = Auth::id();
                    }

                    if (key_exists('document',$violation) && $violation['document'] !== null)
                    {
                        $violation['document'] = FileUploaderService::arendatorViolationFile($violation['document']);
                    }


                    $violation['arendator_id'] = $model->id;

                    ArendatorViolation::create($violation);
                }

            }


        });
    }

}
