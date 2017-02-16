<?php

namespace App\Http\Controllers;

use App\Wrappers\JwtWrapper;

class AuthController extends Controller
{
	public function login($request, $response)
	{
		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if (!$auth) {
			$data['status'] = 'error';
            $data['message'] = 'Authentication failed';
            
            return $response->withStatus(401)
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
		}

		$token = JwtWrapper::encode();

	    $data['status'] = 'ok';
	    $data['token'] = $token;

	    return $response->withStatus(200)
	        ->withHeader('Content-Type', 'application/json')
	        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
	}
}
