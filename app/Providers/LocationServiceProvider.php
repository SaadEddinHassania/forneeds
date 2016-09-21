<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\City;
use App\Models\District;
use App\Models\Street;
use App\Models\LocationMeta;
use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Area::creating(function($area){
            $locationMeta = LocationMeta::create([

            ]);
            $area->location_meta_id=$locationMeta->id;
        });
        City::creating(function ($city) {
            $locationMeta = LocationMeta::create([

            ]);
            $city->location_meta_id = $locationMeta->id;
        });
        District::creating(function ($district) {
            $locationMeta = LocationMeta::create([

            ]);
            $district->location_meta_id = $locationMeta->id;
        });
        Street::creating(function ($street) {
            $locationMeta = LocationMeta::create([

            ]);
            $street->location_meta_id = $locationMeta->id;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
