<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // En entornos serverless (Vercel) redirigir la caché de vistas compiladas a /tmp
        if (config('app.env') === 'production') {
            $viewPath = '/tmp/views';
            if (!file_exists($viewPath)) {
                mkdir($viewPath, 0777, true);
            }
            config(['view.compiled' => $viewPath]);
        }
    }

    public function boot(): void
    {
        // Usar Bootstrap 5 para la paginación
        Paginator::useBootstrapFive();
    }
}
