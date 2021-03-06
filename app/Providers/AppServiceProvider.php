<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \App\Models\Rule::observe(\App\Observers\RuleObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Write::observe(\App\Observers\WriteObserver::class);
        \App\Models\Hotel::observe(\App\Observers\HotelObserver::class);
        \App\Models\Travel::observe(\App\Observers\TravelObserver::class);
        \App\Models\Chat::observe(\App\Observers\ChatObserver::class);
        // Carbon 中文化配置
        Carbon::setlocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \API::error(function (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404);
        });

        \API::error(function (\Illuminate\Auth\Access\AuthorizationException $exception) {
            abort(403, $exception->getMessage());
        });
    }
}
