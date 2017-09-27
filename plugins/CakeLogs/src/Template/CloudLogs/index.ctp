<?php $this->extend('CakeApp.Common/index');?>

<?php $this->assign('page-title', 'Cloud Logs'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Cloud Log'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Cloud Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cloud Log'), ['action' => 'add']) ?> </li>
            </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cube"></i></a></li>
    <li><a href="#">Cake Logs</a></li>
    <li class="active"><label class="label label-default">Logs</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if(count($cloudLogs) > 0) : ?>
<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover table-vcenter">
                <thead>
                <tr>
                                        <td><?= $this->Paginator->sort('id') ?></td>
                                        <td><?= $this->Paginator->sort('resource_key') ?></td>
                                        <td><?= $this->Paginator->sort('event_type') ?></td>
                                        <td><?= $this->Paginator->sort('severity') ?></td>
                                        <td><?= $this->Paginator->sort('created') ?></td>
                                        <td class="actions text-center"><?= __('Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cloudLogs as $cloudLog): ?>
                <tr>
                                        <td><?= $this->Number->format($cloudLog->id) ?></td>
                                        <td><?= h($cloudLog->resource_key) ?></td>
                                        <td><?= h($cloudLog->event_type) ?></td>
                                        <td><?= h($cloudLog->severity) ?></td>
                                        <td><?= h($cloudLog->created) ?></td>
                                        <td class="actions text-center">
                        <div class="btn-group">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $cloudLog->id], ['class' => 'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cloudLog->id], ['class' => 'btn btn-xs btn-default']) ?>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete-<?= $cloudLog->id?>">Delete</button>

                        </div>
                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $cloudLog->id, 'name' => $cloudLog->id]); ?>
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
                <p><strong>You currently have now Cloud Logs</strong></p>
                <p>To get started, click to button bellow and create new Cloud Log</p>
                <?= $this->Html->link(__('Add new Cloud Log'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- End page Content -->
