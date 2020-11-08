<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Services\GeolocalizationService;

class StoreGeolocalization implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $attribute;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $geolocalizationService = new GeolocalizationService();
        $geolocalizationService->store([
            "user_id" => $this->attribute['user_id'],
            "latitude" => $this->attribute['latitude'],
            "longitude" => $this->attribute['longitude']
        ]);
    }
}
