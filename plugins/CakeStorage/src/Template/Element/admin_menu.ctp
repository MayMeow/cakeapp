<ul class="nav nav-tabs">
    <li role="presentation" class="<?= $this->request->params['controller'] == 'Buckets' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-bitbucket"></i> Buckets'), ['controller' => 'Buckets', 'action' => 'index'], ['escape' => false]) ?> </li>
    <li role="presentation" class="<?= $this->request->params['controller'] == 'Disks' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-hdd-o"></i> Disks'), ['controller' => 'Disks', 'action' => 'index'], ['escape' => false]) ?> </li>
    <li role="presentation" class="<?= $this->request->params['controller'] == 'GitRepositories' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-git"></i> Git'), ['controller' => 'GitRepositories', 'action' => 'index'], ['escape' => false]) ?> </li>
</ul>
