<?php

namespace App\Providers;

use App\Services\MstTranstype\MstTranstypeService;
use App\Services\MstTranstype\MstTranstypeServiceImplement;
use App\Services\Transaction\TransactionService;
use App\Services\Transaction\TransactionServiceImplement;
use App\Services\User\UserService;
use App\Services\User\UserServiceImplement;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserService::class, UserServiceImplement::class);
        $this->app->bind(MstTranstypeService::class, MstTranstypeServiceImplement::class);
        $this->app->bind(TransactionService::class, TransactionServiceImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::environment('production')) {
            URL::forceScheme('https');
        }
    }
}
