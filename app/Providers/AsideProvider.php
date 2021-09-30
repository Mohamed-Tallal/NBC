<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\Offers;
use Illuminate\Support\ServiceProvider;

class AsideProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('dashboard.layouts._aside',function ($view){
            $offers = Offers::where('readable',1)->count();
            $contactUs = ContactUs::where('readable',1)->count();
            $view->with([
                'offers' => $offers,
                'contactUs' => $contactUs,
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
