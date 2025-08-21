<?php

$env = getenv('APP_ENV') ?: 'development';
$databaseUrl = getenv('DATABASE_URL');

$connections = [];

if ($env === 'production' && $databaseUrl) {
    $url = parse_url($databaseUrl);
    $connections['pgsql'] = [
        'driver' => 'pgsql',
        'host' => $url['host'],
        'port' => $url['port'],
        'database' => ltrim($url['path'], '/'),
        'username' => $url['user'],
        'password' => $url['pass'],
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
    ];
} else {
    $connections['mysql'] = [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'author_book_management_system',
        'username' => 'root',
        'password' => 'Aa161616',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => null,
    ];

    $connections['sqlite'] = [
        'driver' => 'sqlite',
        'database' => database_path('test.sqlite'),
        'prefix' => '',
    ];
}

return [
    'default' => $env === 'production' ? 'pgsql' : ($env === 'test' ? 'sqlite' : 'mysql'),
    'connections' => $connections,
    // ✅ Add this line
    'migrations' => 'migrations',
];
