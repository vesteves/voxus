<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Services\GeolocalizationService;

class GeolocalizationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldListUserLocalizations()
    {
        $response = $this->json('POST', '/api/geolocalization/show', ["user_id" => 2]);

        $response->assertStatus(200);
    }

    public function testSholdStoreGeolocalization()
    {
        $geolocalizationService = new GeolocalizationService();
        $result = $geolocalizationService->store([
            "user_id" => 3,
            "latitude" => "45.5017",
            "longitude" => "-73.5673"
        ]);

        $this->assertTrue($result);
    }
}
