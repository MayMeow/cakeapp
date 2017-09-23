<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-th"></i>
    <span class="caret"></span>
    <ul class="dropdown-menu">
        <li><a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index']) ?>">Authentication</a></li>
        <li><a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'MCloudResources', 'controller' => 'OwnedResources', 'action' => 'index']) ?>">Resources</a></li>
        <li><a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'CakeStorage', 'controller' => 'Buckets', 'action' => 'index']) ?>">Storage</a></li>
        <li><a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'CakeNetworking', 'controller' => 'Domains', 'action' => 'index']) ?>">Networking</a></li>
        <li><a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'MCloudLogging', 'controller' => 'CloudLogs', 'action' => 'index']) ?>">Logging</a></li>
        <li><a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'MCloudCompute', 'controller' => 'Containers', 'action' => 'index']) ?>">Compute Engine</a></li>
        <li><a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'MCloudHome', 'controller' => 'devices', 'action' => 'index']) ?>">Home Cloud</a></li>
    </ul>
</a>