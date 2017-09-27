<?php

/**
 * Created by PhpStorm.
 * User: martin
 * Date: 4/3/2017
 * Time: 10:27 PM
 */
namespace MayMeow\Http;

use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Zend\Diactoros\Stream;

trait AppRequestTrait
{
    protected function allowedapp(ServerRequest $request, Response $response)
    {
    }
}