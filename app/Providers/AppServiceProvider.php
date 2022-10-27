<?php

namespace App\Providers;

use App\Models\Notify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $noti=Notify::paginate(5)->sortByDesc("created_at")->first();
        View::share('notify',$noti);
    }
}
