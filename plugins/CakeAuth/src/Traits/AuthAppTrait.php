<?php

namespace CakeAuth\Traits;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

/**
 * Created by PhpStorm.
 * User: martin
 * Date: 4/4/2017
 * Time: 7:55 PM
 */
trait AuthAppTrait
{
    protected $_authApp;

    /**
     * @param ServerRequest $request
     * @param Response $response
     * @return bool|Response
     */
    protected function _authorizeApplication(ServerRequest $request, Response $response)
    {
        if ($this->_getAuthApplication($request, $response)) return true;

        return $response->withStringBody(json_encode([
            'message' => 'Failed to authorize application',
            'code' => '500'
        ]))->withStatus(500);
    }

    /**
     * Method _getAuthApplication
     * @param ServerRequest $request
     * @param Response $response
     * @return bool
     */
    protected function _getAuthApplication(ServerRequest $request, Response $response)
    {
        $authAppTable = TableRegistry::get('CakeAuth.AuthApplications');

        $app = $authAppTable->find()->where([
            'client_key LIKE' => $request->getData('client_id'),
            'client_secret LIKE' => $request->getData('client_secret')
        ])->first();

        if ($app) {
            $this->_authApp = $app;

            return true;
        }

        return false;
    }
}