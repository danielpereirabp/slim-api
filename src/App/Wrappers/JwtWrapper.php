<?php

namespace App\Wrappers;

use Firebase\JWT\JWT;
 
class JwtWrapper
{
    public static function encode(array $options = [])
    {
        $tokenId       = base64_encode(mcrypt_create_iv(32));
        $issuedAt      = time();
        $notBefore     = $issuedAt + 5;
        $expirationSec = isset($options['expiration_sec']) ? $options['expiration_sec'] : 3600;
        $expire        = $notBefore + $expirationSec;
        $serverName    = $_SERVER['SERVER_NAME'];

        $payload = [
            'jti' => $tokenId,
            'iat' => $issuedAt,
            'nbf' => $notBefore,
            'exp' => $expire,
            'iss' => $serverName
        ];
 
        return JWT::encode($payload, getenv('JWT_SECRET'), 'HS256');
    }
 
    public static function decode($jwt)
    {
        return JWT::decode($jwt, getenv('JWT_SECRET'), ['HS256']);
    }
}
