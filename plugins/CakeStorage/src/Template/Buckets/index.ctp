<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', 'Buckets'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Bucket'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Buckets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bucket'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-server"></i></a></li>
    <li><a href="#">Storage</a></li>
    <li><a href="#"><label class="label label-default"><i class="fab fa-bitbucket"></i> Buckets</label></a></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->
<?php if (count($buckets) > 0) : ?>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <!--<td><?/*= $this->Paginator->sort('id') */?></td>-->
                        <td><?= $this->Paginator->sort('name') ?></td>
                        <td><?= $this->Paginator->sort('uid') ?></td>
                        <td><?= $this->Paginator->sort('created') ?></td>
                        <!--<td><?/*= $this->Paginator->sort('modified') */?></td>-->
                        <td class="actions text-center"><?= __('Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($buckets as $bucket): ?>
                        <tr>
                            <!--<td><?/*= $this->Number->format($bucket->id) */?></td>-->
                            <td>
                                <strong><i class="fab fa-bitbucket"></i></strong>
                                <?= h($bucket->name) ?>
                            </td>
                            <td><?= h($bucket->uid) ?></td>
                            <td><?= h($bucket->created) ?></td>
                            <!--<td><?/*= h($bucket->modified) */?></td>-->
                            <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $bucket->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bucket->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                            data-target="#modal-delete-<?= $bucket->id ?>">Delete
                                    </button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $bucket->id, 'name' => $bucket->id]); ?>
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
                    <p><strong>You currently have now buckets</strong></p>
                    <p>To get started, click to button bellow and create new bucket</p>
                    <?= $this->Html->link(__('Add new bucket'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<!-- End page Content -->
