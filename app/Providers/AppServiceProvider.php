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

        // Autocrear SQLite y correr migraciones en entornos serverless (Vercel)
        if (config('database.default') === 'sqlite') {
            $dbPath = config('database.connections.sqlite.database');
            if ($dbPath === '/tmp/database.sqlite' && !file_exists($dbPath)) {
                touch($dbPath);
                try {
                    \Illuminate\Support\Facades\Artisan::call('migrate', [
                        '--force' => true,
                    ]);
                } catch (\Exception $e) {
                    // Silenciar errores concurrentes
                }
            }
        }
    }
}
