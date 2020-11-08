<?php

namespace App\Services;

use App\Models\Geolocalization;
use App\Models\User;

class GeolocalizationService
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store($attribute)
    {
        Geolocalization::create([
            "user_id" => $attribute['user_id'],
            "latitude" => $attribute['latitude'],
            "longitude" => $attribute['longitude']
        ]);

        $user = User::find($attribute['user_id']);
        $user->latitude = $attribute['latitude'];
        $user->longitude = $attribute['longitude'];
        $user->save();

        return true;
    }
}
