<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Corona;
use App\State;
use App\Tot;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);

         $countryshare = Corona::all();
        View::share('countryshare',$countryshare);

        $stateshare = State::select()->where("Country","United States")->get();
        View::share('stateshare',$stateshare);

        $statesharedz = State::select()->where("Country","Algeria")->get();
        View::share('statesharedz',$statesharedz);

        $total = Tot::find(1);
        View::share('total',$total);



    }
}
