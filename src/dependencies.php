<?php

// DIC configuration

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    
    return $logger;
};

// Service factory for the ORM
$container['db'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['auth'] = function($c) {
	return new \App\Auth\Auth($c);
};

$container['token'] = function ($c) {
    return new \App\Auth\Token;
};

$container['AuthController'] = function($c) {
	return new \App\Http\Controllers\AuthController($c);
};

$container['UserController'] = function($c) {
    return new \App\Http\Controllers\UserController($c);
};

$container['UserRepository'] = function($c) {
    return new \App\Repositories\UserRepository($c['db']);
};
