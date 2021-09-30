<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\Offers;
use Illuminate\Support\ServiceProvider;

class HeaderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('dashboard.layouts.header',function ($view){
            $offers = Offers::where('readable',1)->orderBy('id', 'desc')->get();
            $contactUs = ContactUs::where('readable',1)->orderBy('id', 'desc')->get();
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
