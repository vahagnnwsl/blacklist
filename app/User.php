<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'email',
        'company_name', 'full_name', 'inn',
        'psrnie', 'psrn', 'passport',
        'document', 'brand', 'country',
        'city', 'address', 'web_site',
        'advertising_number', 'real_estate_count', 'contact_person_full_name',
        'contact_phone', 'contact_person_position', 'about_business',
        'password', 'status', 'is_api_user', 'client_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getContactDataAttribute()
    {
        $data = [
            'email' => $this->email,
            'about_business' => $this->about_business,
            'contact_person_full_name' => $this->contact_person_full_name,
            'contact_phone' => $this->contact_phone,
        ];

        if ($this->type !== 2) {
            $data = array_merge($data, ['contact_person_position' => $this->contact_person_position]);
        }
        return $data;
    }

    public function getBasicDataAttribute()
    {

        $data = [
            'inn' => $this->inn,
            'country' => $this->country,
            'city' => $this->city,
            'address' => $this->address,
            'web_site' => $this->web_site,
            'advertising_number' => $this->advertising_number,
            'real_estate_count' => $this->real_estate_count,
        ];

        if ($this->type === 2) {
            $data = array_merge($data, ['passport' => $this->passport, 'full_name' => $this->full_name]);
        } else {
            $data = array_merge($data, ['brand' => $this->brand, 'company_name' => $this->company_name]);
            if ($this->type === 3) {
                $data = array_merge($data, ['psrn' => $this->psrn]);
            } else {
                $data = array_merge($data, ['psrnie' => $this->psrnie]);
            }
        }
        return $data;
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailNotification);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new  \App\Notifications\PasswordResetNotification($token));
    }

    public function getDocAttribute()
    {
        return '/storage/documents/' . $this->document;
    }

    public function arendators()
    {
        return $this->hasMany(Arendator::class);
    }

    public function arendatorsByViolations()
    {
        return array_unique(ArendatorViolation::whereHas('arendator')->where('user_id',$this->id)->orderBy('created_at','desc')->pluck('arendator_id')->toArray());

    }

    public function getTypeNameAttribute()
    {
        return array_keys(Arr::where(config('constants.user'), function ($value, $key) {
            return $value === $this->type;
        }))[0];

    }


}
