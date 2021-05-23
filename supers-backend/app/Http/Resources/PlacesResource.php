<?php

namespace App\Http\Resources;

use App\Models\Donation;
use App\Models\PlacePhotos;
use App\Models\User;
use Illuminate\Http\Resources\Json\Resource;

class PlacesResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        "id"=> $this->id,
        "is_active"=> $this->is_active,
        "latitude"=> $this->latitude,
        "longitude"=> $this->longitude,
        "description"=> $this->description,
        "type"=> $this->type,
        "area"=> $this->area,
        "area_type"=> $this->area_type,
        "goal_money"=> $this->goal_money,
        "currency"=> $this->currency,
        "user"=>   new UserResource(User::find($this->user_id)),
        "donations"=> Donation::where('place_id', $this->id)->sum("money"),
        "photos"=> PlacePhotoResource::collection(PlacePhotos::orderBy('order', 'desc')->where("place_id", $this->id)->get())
        
    ];
    }
}
