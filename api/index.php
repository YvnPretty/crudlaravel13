<?php

// Asegurar que la base de datos SQLite exista y correr las migraciones en el arranque de la función
$dbPath = '/tmp/database.sqlite';
if (!file_exists($dbPath)) {
    touch($dbPath);
    
    // Ejecutar la migración mediante el CLI usando el binario de PHP de Vercel
    shell_exec('php ' . __DIR__ . '/../artisan migrate --force 2>&1');
}

require __DIR__ . '/../public/index.php';
