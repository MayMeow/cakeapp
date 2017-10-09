<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', 'Group'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('CakeResource.admin_menu') ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Resource Group'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Resource Group'), ['action' => 'edit', $resourceGroup->id]) ?> </li>
        <li><?= $this->Html->link(__('List Resource Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resource Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cube"></i></a></li>
    <li><a href="#"><?= $resourceGroup->user->username ?> <i class="fa fa-user-circle-o"></i></a></li>
    <li class="active"><label class="label label-default"><?= h($resourceGroup->name) ?></label></li>
    <li>Rooms</li>
</ol>
<?php $this->end() ?>

<?php $this->start('projects-navigation'); ?>
<?= $this->Element('CakeApp.projects-nav', ['navItems' => $viewStack->get('btnViemMenu')]) ?>
<?php $this->end() ?>

<!-- Begin page content -->
<table class="table table-hover">
    <tr>
        <th><?= __('Name') ?></th>
        <td style="text-align: right"><?= h($resourceGroup->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Uid') ?></th>
        <td style="text-align: right">
            <label class="label label-info"><?= h($resourceGroup->uid) ?></label>
        </td>
    </tr>
    <tr>
        <th><?= __('Slug') ?></th>
        <td style="text-align: right"><?= h($resourceGroup->slug) ?></td>
    </tr>
    <tr>
        <th><?= __('Owner') ?></th>
        <td style="text-align: right"><?= $resourceGroup->has('user') ? $this->Html->link($resourceGroup->user->username, ['controller' => 'Users', 'action' => 'view', $resourceGroup->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right">
            <label class="label label-info">
                <?= $this->Number->format($resourceGroup->id) ?>
            </label>
        </td>
    </tr>
</table>

<?= $this->Element('CakeResource.Group/repositories')?>
<!-- End page Content -->
