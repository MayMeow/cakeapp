<div class="cinema border-bottom-gray">
    <h3><i class="fa fa-bar-chart-o"></i> Logging</h3>
</div>
<ul class="nav nav-sidebar">
    <li class="<?= $this->request->params['controller'] == 'CloudLogs' ? 'active' : '' ?>"><?= $this->Html->link(__('<i class="fa fa-desktop"></i> Logs'), ['controller' => 'CloudLogs', 'action' => 'index'], ['escape' => false]) ?> </li>
</ul>