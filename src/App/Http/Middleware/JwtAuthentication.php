<?php

namespace App\Http\Middleware;

use App\Wrappers\JwtWrapper;

class JwtAuthentication
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

	public function __invoke($request, $response, $next)
	{
		$authorization = $request->getHeaderLine("Authorization");
        list($jwt) = sscanf($authorization, 'Bearer %s');

		if(!$jwt) {
			$data['status'] = 'error';
            $data['message'] = 'Uninvited Token';
            
            return $response
            	->withStatus(401)
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
		}

		try {
            $decoded = JwtWrapper::decode($jwt);
            $this->container->token->hydrate($decoded);
        } catch(\Exception $ex) {
            $data['status'] = 'error';
            $data['message'] = 'Unauthorized access';
            
            return $response
            	->withStatus(401)
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }

		$response = $next($request, $response);
		
		return $response;		
	}
}
