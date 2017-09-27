<?php $this->extend('CakeApp.Common/index');?>

<?php $this->assign('page-title', 'Users'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-shield"></i></a></li>
    <li><a href="#">IAM & Admin</a></li>
    <li><label class="label label-default"><i class="fa fa-user-o"></i> Users</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->
<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover table-vcenter">
                <thead>
                <tr>
                    <td><?= $this->Paginator->sort('id') ?></td>
                    <td><?= $this->Paginator->sort('username') ?></td>

                    <td><?= $this->Paginator->sort('role') ?></td>
                    <td><?= $this->Paginator->sort('verified') ?></td>
                    <td>2FA</td>
                    <td><?= $this->Paginator->sort('created') ?></td>

                    <td class="actions text-center"><?= __('Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td>
                            <strong><i class="fa fa-user-circle"></i></strong>
                            <?= h($user->username) ?>
                        </td>

                        <td><label class="label label-info"><?= h($user->role) ?></label></td>
                        <td><?= h($user->verified) ?></td>
                        <td><?= $user->two_fa_secret ? '<i class="fa fa-lock text-success"></i>' : '<i class="fa fa-times"></i>' ?></td>
                        <td><?= h($user->created) ?></td>

                        <td class="actions text-center">
                            <div class="btn-group">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-xs btn-default']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-xs btn-default']) ?>
                                <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                        data-target="#modal-delete-<?= $user->id ?>">Delete
                                </button>

                            </div>
                            <?= $this->element('CakeBootstrap.deletemodal', ['id' => $user->id, 'name' => $user->id]); ?>
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
<!-- End page Content -->
