<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 5/18/2017
 * Time: 12:33 PM
 */

namespace CakeAuth\Authenticator;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use CakeAuth\Traits\AuthAppTrait;
use CakeAuth\Traits\AuthTokenTrait;
use CakeAuth\Traits\AuthUserTrait;

class TokenAuthenticator
{
    use AuthUserTrait, AuthAppTrait, AuthTokenTrait;

    public function authenticate(ServerRequest $request, Response $response)
    {
        return $this->_authorizeWithToken($request, $response, $this->_getAuthApplication($request, $response));
    }
}