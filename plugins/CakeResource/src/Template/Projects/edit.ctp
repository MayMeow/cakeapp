<?php $this->extend('CakeApp.Common/view'); ?>

<?php $this->assign('page-title', 'Resource Groups'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Resource Group'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Resource Groups'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                <li><?= $this->Html->link(__('List Buckets'), ['controller' => 'Buckets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bucket'), ['controller' => 'Buckets', 'action' => 'add']) ?> </li>
            </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<?php $this->end() ?>

<!-- Begin page content -->

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Form</h4>
    </div>
    <div class="panel-body">
        <?= $this->Form->create($resourceGroup, ['align' => [
        'sm' => [
        'left' => 6,
        'middle' => 6,
        'right' => 12
        ],
        'md' => [
        'left' => 3,
        'middle' => 9
        ]
        ]]) ?>

        <div class="form-body">
            <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('uid');
                        echo $this->Form->input('user_id', ['options' => $users]);
                        echo $this->Form->input('slug');
                        echo $this->Form->input('people._ids', ['options' => $people]);
                        ?>
        </div>
        <div class="form-action">
            <div class="row">
                <div class="col-md-offset-3 col-md-4">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn green']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- End page Content -->
