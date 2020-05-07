<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    protected $guarded = [];

    public function getSrcAttribute()
    {
        return '/storage/documents/' . $this->path;
    }
}
