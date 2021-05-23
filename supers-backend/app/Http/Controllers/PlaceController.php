<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlacesResource;
use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Database\Eloquent\Collection;

class PlaceController extends Controller
{
    public function index()
    {
        return PlacesResource::collection(Place::all());
    }
    public function show($place)
    {
        return new PlacesResource(Place::find($place));
    }
    public function store()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
