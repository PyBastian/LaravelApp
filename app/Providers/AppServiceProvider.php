<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Vehicle;
use App\Observers\VehicleObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Vehicle::observe(VehicleObserver::class);
    }
}
