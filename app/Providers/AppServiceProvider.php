<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
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
