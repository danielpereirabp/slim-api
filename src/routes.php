<?php

use App\Http\Middleware\JwtAuthentication;

$app->post('/auth/login', 'AuthController:login');

$app->group('', function () {

	$this->get('/token', function ($request, $response, $args) {
	    print_r($this->token); exit;
	});
	
	$this->get('/users', 'UserController:index');

})->add(new JwtAuthentication($container));
