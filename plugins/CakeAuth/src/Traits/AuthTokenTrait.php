<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 4/4/2017
 * Time: 10:29 PM
 */

namespace CakeAuth\Traits;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

trait AuthTokenTrait
{
    protected $_authByToken;

    /**
     * @param ServerRequest $request
     * @param Response $response
     * @param $authApplication
     * @return bool|Response
     */
    protected function _authorizeWithToken(ServerRequest $request, Response $response, $authApplication)
    {
        if(!$authApplication) {
            return $response->withStringBody(json_encode([
                'message' => 'Failed to authorize application',
                'code' => '500'
            ]))->withStatus(500);
        }

        if(!$this->_getUserByToken($request, $response)) {
            return $response->withStringBody(json_encode([
                'message' => 'Failed to authenticate user',
                'code' => '500'
            ]))->withStatus(500);
        }

        // If user is authenticated return true
        return true;
    }

    /**
     * @param ServerRequest $request
     * @param Response $response
     * @return bool
     */
    protected function _getUserByToken(ServerRequest $request, Response $response)
    {
        $tokenTable = TableRegistry::get('CakeAuth.AccessTokens');

        $user = $tokenTable->find()
            ->select(['User_id', 'token'])
            ->where(['token LIKE' => ($request->getHeader('Authorization'))[0]])
            ->first();

        if($user) {
            $this->_authByToken = $user;

            return true;
        }

        return false;
    }
}