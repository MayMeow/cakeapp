<?php $this->extend('CakeApp.Common/view'); ?>

<?php $this->assign('page-title', 'sshKey->title'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Ssh Key'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Ssh Key'), ['action' => 'edit', $sshKey->id]) ?> </li>
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

<table class="table table-hover">
    <tr>
        <th><?= __('Title') ?></th>
        <td style="text-align: right"><?= h($sshKey->title) ?></td>
    </tr>
    <tr>
        <th><?= __('User') ?></th>
        <td style="text-align: right"><?= $sshKey->has('user') ? $this->Html->link($sshKey->user->id, ['controller' => 'Users', 'action' => 'view', $sshKey->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($sshKey->id) ?></td>
    </tr>
</table>


<div class="">
    <h4><?= __('Public Key') ?></h4>
    <?= $this->Text->autoParagraph(h($sshKey->public_key)); ?>
</div>

<!-- End page Content -->
