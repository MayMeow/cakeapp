<?php $this->extend('CakeApp.Common/index');?>

<?php $this->assign('page-title', 'Ssh Keys'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Ssh Key'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Ssh Keys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ssh Key'), ['action' => 'add']) ?> </li>
                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
            </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-shield"></i></a></li>
    <li><a href="#">IAM & Admin</a></li>
    <li><label class="label label-default"><i class="fa fa-user-o"></i> SSH Keys</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if(count($sshKeys) > 0) : ?>
<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover table-vcenter">
                <thead>
                <tr>
                                        <td><?= $this->Paginator->sort('id') ?></td>
                                        <td><?= $this->Paginator->sort('title') ?></td>
                                        <td><?= $this->Paginator->sort('user_id') ?></td>
                                        <td class="actions text-center"><?= __('Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($sshKeys as $sshKey): ?>
                <tr>
                                        <td><?= $this->Number->format($sshKey->id) ?></td>
                                        <td><?= h($sshKey->title) ?></td>
                                        <td>
                        <?= $sshKey->has('user') ? $this->Html->link($sshKey->user->id, ['controller' => 'Users', 'action' => 'view', $sshKey->user->id]) : '' ?>
                    </td>
                                        <td class="actions text-center">
                        <div class="btn-group">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $sshKey->id], ['class' => 'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sshKey->id], ['class' => 'btn btn-xs btn-default']) ?>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete-<?= $sshKey->id?>">Delete</button>

                        </div>
                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $sshKey->id, 'name' => $sshKey->id]); ?>
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
                <p><strong>You currently have now Ssh Keys</strong></p>
                <p>To get started, click to button bellow and create new Ssh Key</p>
                <?= $this->Html->link(__('Add new Ssh Key'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- End page Content -->
