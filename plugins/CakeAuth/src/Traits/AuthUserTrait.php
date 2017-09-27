<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 4/4/2017
 * Time: 9:30 PM
 */

namespace CakeAuth\Traits;


use Cake\Auth\DefaultPasswordHasher;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

trait AuthUserTrait
{
    protected $_authUser;

    /**
     * @param ServerRequest $request
     * @param Response $response
     * @param $authApplication
     * @return bool|Response
     */
    protected function _authenticateUser(ServerRequest $request, Response $response, $authApplication)
    {
        if(!$authApplication) {
            return $response->withStringBody(json_encode([
                'message' => 'Failed to authorize application',
                'code' => '500'
            ]))->withStatus(500);
        }

        if(!$this->_getUserByCredentials($request, $response)) {
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
     * @return bool|mixed
     */
    protected function _getUserByCredentials(ServerRequest $request, Response $response)
    {
        $userTable = TableRegistry::get('CakeAuth.Users');

        $user = $userTable->find()
            ->where(['username' => $request->getData('username')])
            ->first();

        $verified = (new DefaultPasswordHasher())->check($request->getData('password'), $user->password);

        // return user info
        if ($verified) {
            $this->_authUser = $user;
            return $user;
        }

        return false;
    }

}