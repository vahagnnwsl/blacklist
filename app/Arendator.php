<?php

namespace App;

use App\Services\FileUploaderService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function violations()
    {
        return $this->hasMany(ArendatorViolation::class)->orderBy('created_at', 'desc');
    }

    public function scopeOfPassport($query, $arg1, $arg2)
    {
        return $query->where('passport_serial', $arg1)->where('passport_number', $arg2);
    }

    public function scopeSearchAll($query, $region, $key)
    {
        $keys = false;
        if ($key) {
            $keys = explode(' ', $key);

        }
        return $query->when($region, function ($q) use ($region) {
            return $q->where('region', $region);
        })->when($keys, function ($q) use ($keys) {
            foreach ($keys as $k => $val) {
                $q->where('search', 'LIKE','%'.$val.'%');
            }
            return $q;

        })->whereHas('user')->where('status', 1);
    }

    public function scopeExist($query, array $arg)
    {
        if ((int)$arg['type'] === 1) {
            return $query->where([
                'passport_serial' => $arg['passport_serial'],
                'passport_number' => $arg['passport_number']
            ]);
        }
        return $query->where([
            'inn' => $arg['inn']
        ]);

    }
}
