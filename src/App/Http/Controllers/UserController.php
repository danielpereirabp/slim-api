<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
	public function index($request, $response)
	{
		$data = $this->container->get('UserRepository')->getAll();

		return $response->withStatus(200)
	        ->withHeader('Content-Type', 'application/json')
	        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
	}
}
