<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlacePhotos extends Model
{
    protected $table = 'place_photos';

    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }
}
