<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }
    
    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }

    // public function userPoints()
    // {
    //     return $this->hasMany('App\Models\UserPoints');
    // }

    // public function workers(){
    //     return $this->hasMany('App\Models\Worker');
    // }

    // public function workerGroups(){
    //     return $this->hasMany('App\Models\WorkerGroup');
    // }
}
