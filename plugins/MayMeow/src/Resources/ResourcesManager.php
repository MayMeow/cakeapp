<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2/9/2017
 * Time: 4:23 PM
 */

namespace MayMeow\Resources;

use Cake\Controller\Controller;

class ResourcesManager extends Controller
{
    public function create($options = null)
    {
        $resourceModel = $this->loadModel('MCloudResources.OwnedResources');
        $resource = $resourceModel->newEntity();

        $resource->name = $options['name'];
        $resource->resource_class_id = $this->_findResourceClass($options['resourceClass']);
        $resource->user_id = $options['userId'];
        $resource->instance_key = $options['instanceKey'];
        $resource->resource_group_id = $options['resourceGroup'];

        $response = $resourceModel->save($resource);

        return $response->id;

    }

    protected function _findResourceClass($key = null)
    {
        $resourceClassModel =$this->loadModel('MCloudResources.ResourceClasses');
        $respClass = $resourceClassModel->find()->where(['uname LIKE' => $key])->select(['id'])->first();

        return $respClass->id;
    }
}