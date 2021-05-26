<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Resources\PlacesResource;
use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Collection;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $a = auth()->user();
        } catch (Exception $e) {
            return "Hey";
        }
        if (is_null($a["id"])) {
            return response("Please use JWT");
        }
        $donation = new Donation;
        $donation->money = $request["money"];
        $donation->currency = $request["currency"];
        $donation->user_id = $a["id"];
        $donation->place_id = $request["place_id"];
        $donation->save();

        return response("Created!");
    }
    public function delete($donationId)
    {
        $donation = Donation::find($donationId)->first();
        $donation->delete();
        return response("Deleted");
    }
}
