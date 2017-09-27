<ul class="nav nav-tabs">
    <li role="presentation" class="<?= $this->request->params['controller'] == 'Devices' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-codepen"></i> Devices'), ['controller' => 'Devices', 'action' => 'index'], ['escape' => false]) ?> </li>
</ul>