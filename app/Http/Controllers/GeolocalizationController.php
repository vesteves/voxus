<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Geolocalization;
use App\Models\User;

use App\Http\Requests\StoreGeolocalization;
use App\Http\Requests\ShowGeolocalization;

use App\Http\Resources\Geolocalization as GeolocalizationResource;

use App\Jobs\StoreGeolocalization as StoreGeolocalizationJob;

use Location;

class GeolocalizationController extends Controller
{
    public function store (StoreGeolocalization $request)
    {
        $location = Location::get();

        StoreGeolocalizationJob::dispatch([
            "user_id" => $request->input('user_id'),
            "latitude" => $location->latitude,
            "longitude" => $location->longitude
        ]);

        return response()->json([
            "status" => "success"
        ]);
    }

    public function show (ShowGeolocalization $request)
    {
        $user = User::find($request->input('user_id'));

        return GeolocalizationResource::collection($user->geolocalizations);
    }
}
