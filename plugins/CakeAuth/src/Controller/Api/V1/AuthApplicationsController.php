<?php
namespace CakeAuth\Controller\Api\V1;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use CakeAuth\Controller\AbstractAuthApplicationsController;
use CakeAuth\Traits\AuthAppTrait;
use CakeAuth\Traits\AuthTokenTrait;
use CakeAuth\Traits\AuthUserTrait;
use MayMeow\Generator\RandomStringGenerator;

/**
 * AuthApplication Controller
 *
 * @property \CakeAuth\Model\Table\AuthApplicationTable $AuthApplication
 */
class AuthApplicationsController extends AbstractAuthApplicationsController
{
    use AuthAppTrait;
    use AuthUserTrait;
    use AuthTokenTrait;

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub

        $this->loadComponent('RequestHandler');
    }

    /**
     * @param Event $event
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        $this->Auth->allow();

        // Try to authenticate App User
        if(in_array($this->request->getParam('action'), ['accessToken'])) {
            return $this->_authenticateUser($this->request, $this->response, $this->_getAuthApplication($this->request, $this->response));
        }
        return $this->_authorizeWithToken($this->request, $this->response, $this->_getAuthApplication($this->request, $this->response));
    }

    /**
     * Return Access Token for client
     */
    public function accessToken()
    {
        $accessTokenRepository = TableRegistry::get('CakeAuth.AccessTokens');

        $accessToken = $accessTokenRepository->find()
            ->where([
                'auth_application_id' => $this->_authApp->id,
                'user_id' => $this->_authUser->id
            ])->first();

        if(!$accessToken) {
            $newToken = $accessTokenRepository->newEntity();
            $newToken->auth_application_id = $this->_authApp->id;
            $newToken->user_id = $this->_authUser->id;
            $newToken->token = RandomStringGenerator::generate(70);
            $newToken->expires = strtotime('+1 month', time());
            $accessTokenRepository->save($newToken);

            $accessToken = $accessTokenRepository->find()
                ->where([
                    'auth_application_id' => $this->_authApp->id,
                    'user_id' => $this->_authUser->id
                ])->first();
        }

        $this->set('access_token', $accessToken);
        $this->set('_serialize', ['access_token']);
    }

    public function register()
    {

    }

    public function login()
    {

    }

    public function test()
    {

        $this->set('test', $this->_authByToken);
        $this->set('_serialize', ['test']);
    }
}