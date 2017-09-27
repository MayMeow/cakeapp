<ul class="nav nav-tabs">
    <li role="presentation" class="<?= $this->request->params['controller'] == 'Users' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-user"></i> Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?> </li>
</ul>