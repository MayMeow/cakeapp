<?php $this->extend('CakeApp.Common/view'); ?>

<?php $this->assign('page-title', 'Resource Groups'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Resource Group'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Resource Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resource Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buckets'), ['controller' => 'Buckets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bucket'), ['controller' => 'Buckets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cube"></i></a></li>
    <li><a href="#">Resources</a></li>
    <li class="active"><label class="label label-default">Groups</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if (count($resourceGroups) > 0) : ?>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <td><?= $this->Paginator->sort('name') ?></td>
                        <td><?= $this->Paginator->sort('user_id') ?></td>
                        <td class="actions text-center"><?= __('Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($resourceGroups as $resourceGroup): ?>
                        <tr>
                            <td><label class="label label-info"><?= $this->Number->format($resourceGroup->id) ?></label> <?= h($resourceGroup->name) ?></td>
                            <td>
                                <?= $resourceGroup->has('user') ? $this->Html->link($resourceGroup->user->username, ['controller' => 'Users', 'action' => 'view', $resourceGroup->user->id]) : '' ?>
                            </td>
                            <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $resourceGroup->slug], ['class' => 'btn btn-xs btn-default']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resourceGroup->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                            data-target="#modal-delete-<?= $resourceGroup->id ?>">Delete
                                    </button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $resourceGroup->id, 'name' => $resourceGroup->id]); ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="pagination">
                <?php //echo $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?php //echo $this->Paginator->next(__('next') . ' >') ?>
            </ul>
        </div>
    </div>

<?php else : ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h2><i class="fa fa-plus-square-o text-amethyst"></i></h2>
                    <p><strong>You currently have now Resource Groups</strong></p>
                    <p>To get started, click to button bellow and create new Resource Group</p>
                    <?= $this->Html->link(__('Add new Resource Group'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<!-- End page Content -->
