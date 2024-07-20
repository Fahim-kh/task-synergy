<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSettingModel;
use App\Models\Slider;
use App\Models\ServicesModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;
use App\Models\LocationModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('general_setting', function () {
            $data =GeneralSettingModel::first();
            return $data;
        });
        $this->app->singleton('home_slider', function () {
            $data =Slider::where('status',1)->get();
            return $data;
        });
        $this->app->singleton('services', function () {
            $data =ServicesModel::where('status',1)->get();
            return $data;
        });
        $this->app->singleton('team', function () {
            $data =TeamModel::where('status',1)->get();
            return $data;
        });
        $this->app->singleton('testimonial', function () {
            $data =TestimonialModel::where('status',1)->get();
            return $data;
        });
        $this->app->singleton('locations', function () {
            $data =LocationModel::where('status',1)->get();
            return $data;
        });
        $this->app->singleton('menu', function () {
            $data =ServicesModel::with('subservices')->where('status',1)->get();
            return $data;
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
