<?php
namespace CakeAuth\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

class TokenAuthenticate extends BaseAuthenticate
{
    public function authenticate(ServerRequest $request, Response $response)
    {
        // TODO: Implement authenticate() method.

        $userTable = TableRegistry::get('CakeAuth.Users');

        $user = $userTable->find()
            ->where(['username' => $request->getData('username')])
            ->first();

        return $user;
    }

}