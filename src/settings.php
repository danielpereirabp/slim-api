<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name'  => 'slim-app',
            'path'  => __DIR__ . '/../storage/logs/app.log',
            'level' => \Monolog\Logger::DEBUG
        ],

        // Db settings
        'db' => [
            'driver'    => getenv('DB_DRIVER', 'mysql'),
            'host'      => getenv('DB_HOST', 'localhost'),
            'database'  => getenv('DB_NAME'),
            'username'  => getenv('DB_USER'),
            'password'  => getenv('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => getenv('DB_PREFIX', '')
        ],
    ],
];
