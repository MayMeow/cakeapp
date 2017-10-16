<?php $this->extend('CakeMetronic./Common/_layout'); ?>

<?php $this->assign('page-title', 'Certificates'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Certificate'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificate'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-certificate"></i></a></li>
    <li><a href="#">CA</i></a></li>
    <li class="active"><label class="label label-default">Certificates</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if (count($certificates) > 0) : ?>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>

                        <td><?= $this->Paginator->sort('internal_name') ?></td>
                        <td><?= $this->Paginator->sort('ca') ?></td>

                        <td class="actions text-center"><?= __('Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($certificates as $certificate): ?>
                        <tr>

                            <td>
                                <strong><i class="fa fa-key text-amethyst"></i></strong>
                                <?= h($certificate->internal_name) ?>
                                <p>
                                    <small><?= h($certificate->DN) ?></small>
                                </p>
                            </td>
                            <td><?= $certificate->ca ? __('Yes') : __('No'); ?></td>

                            <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $certificate->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $certificate->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                            data-target="#modal-delete-<?= $certificate->id ?>">Delete
                                    </button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $certificate->id, 'name' => $certificate->id]); ?>
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
                    <p><strong>You currently have no Certificates</strong></p>
                    <p>To get started, click to button bellow and create new Certificate</p>
                    <?= $this->Html->link(__('Add new Certificate'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<!-- End page Content -->