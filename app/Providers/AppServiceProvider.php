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
//        $notifies= Notify::where('active', '=', '1')->orderByDesc("created_at")->take(5)->get();
//        View::share('notifies', $notifies);
    }
}
