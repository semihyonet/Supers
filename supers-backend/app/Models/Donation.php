<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }
}
