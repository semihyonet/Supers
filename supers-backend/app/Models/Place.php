<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }
}
