<ul class="nav nav-tabs">
    <li role="presentation" class="<?= $this->request->params['controller'] == 'Containers' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-snowflake-o"></i> Containers'), ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]) ?> </li>
    <li role="presentation" class="<?= $this->request->params['controller'] == 'DockerImages' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-files-o"></i> Images'), ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]) ?> </li>
    <li role="presentation" class="<?= $this->request->params['controller'] == 'DockerImages' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-sitemap"></i> Networks'), ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]) ?> </li>
    <li role="presentation" class="<?= $this->request->params['controller'] == 'DockerImages' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-hdd-o"></i> Volumes'), ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]) ?> </li>
</ul>