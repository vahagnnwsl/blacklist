<?php
namespace App;
use Laravel\Passport\Client as BaseClient;

class Client extends BaseClient
{
    /**
     * Determine if the client should skip the authorization prompt.
     *
     * @return bool
     */
    public function skipsAuthorization()
    {
        return $this->firstParty();
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {

            $model->tokens()->delete();

        });
    }
}
