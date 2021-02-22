<?php
namespace Neatline\Authentication;

use Firebase\JWT\JWT;
use Interop\Container\ContainerInterface;

/**
 * Utility class for handling JWT encoding/decoding.
 */
class JwtUtils
{
    /**
     * Decodes the passed JWT.
     */
    public static function decode(ContainerInterface $serviceLocator, $jwt)
    {
        $globalSettings = $serviceLocator->get('Omeka\Settings');
        $key = $globalSettings->get('neatline_jwt_secret');
        return JWT::decode($jwt, $key, array('HS256'));
    }

    /**
     * Encodes the user ID and token for the passed user into a JWT.
     */
    public static function encode(ContainerInterface $serviceLocator, $user)
    {
        $token = array(
          'user_id' => $user->getId(),
          'token' => $user->getToken()
        );

        $globalSettings = $serviceLocator->get('Omeka\Settings');
        $key = $globalSettings->get('neatline_jwt_secret');

        if (!$key) {
            $key = getenv('NEATLINE_JWT_SECRET');
            if (!$key) $key = 'default_neatline_secret';
            $globalSettings->set('neatline_jwt_secret', $key);
        }

        return JWT::encode($token, $key);
    }
}