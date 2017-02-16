<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds',
    ],
    
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'development',
        
        'development' => [
            'adapter'   => getenv('DB_DRIVER', 'mysql'),
            'host'      => getenv('DB_HOST', 'localhost'),
            'name'      => getenv('DB_NAME'),
            'user'      => getenv('DB_USER'),
            'pass'      => getenv('DB_PASSWORD'),
            'port'      => getenv('DB_PORT', 3306),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]
    ],
];
