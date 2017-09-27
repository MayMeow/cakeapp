<?php $this->extend('CakeApp./Common/index');?>

<?php $this->assign('page-title', 'Application Settings'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Application Setting'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Application Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application Setting'), ['action' => 'add']) ?> </li>
            </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if(count($applicationSettings) > 0) : ?>
<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover table-vcenter">
                <thead>
                <tr>
                                        <td><?= $this->Paginator->sort('id') ?></td>
                                        <td><?= $this->Paginator->sort('config_key') ?></td>
                                        <td><?= $this->Paginator->sort('created') ?></td>
                                        <td><?= $this->Paginator->sort('modified') ?></td>
                                        <td class="actions text-center"><?= __('Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($applicationSettings as $applicationSetting): ?>
                <tr>
                                        <td><?= $this->Number->format($applicationSetting->id) ?></td>
                                        <td><?= h($applicationSetting->config_key) ?></td>
                                        <td><?= h($applicationSetting->created) ?></td>
                                        <td><?= h($applicationSetting->modified) ?></td>
                                        <td class="actions text-center">
                        <div class="btn-group">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $applicationSetting->id], ['class' => 'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicationSetting->id], ['class' => 'btn btn-xs btn-default']) ?>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete-<?= $applicationSetting->id?>">Delete</button>

                        </div>
                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $applicationSetting->id, 'name' => $applicationSetting->id]); ?>
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
                <p><strong>You currently have now Application Settings</strong></p>
                <p>To get started, click to button bellow and create new Application Setting</p>
                <?= $this->Html->link(__('Add new Application Setting'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- End page Content -->
