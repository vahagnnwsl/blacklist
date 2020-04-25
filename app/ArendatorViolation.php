<?php

namespace App;

use App\Services\FileUploaderService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArendatorViolation extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function arendator()
    {
        return $this->hasOne(Arendator::class, 'id', 'arendator_id');
    }




}
