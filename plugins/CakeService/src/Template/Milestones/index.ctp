<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', 'Milestones'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Milestone'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Milestones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milestone'), ['action' => 'add']) ?> </li>
            </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-clipboard"></i></a></li>
    <li><a href="#">Service desk</i></a></li>
    <li class="active"><label class="label label-default">Milestones</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if(count($milestones) > 0) : ?>
<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover table-vcenter">
                <thead>
                <tr>
                                        <td><?= $this->Paginator->sort('id') ?></td>
                                        <td><?= $this->Paginator->sort('title') ?></td>
                                        <td><?= $this->Paginator->sort('start_date') ?></td>
                                        <td><?= $this->Paginator->sort('end_date') ?></td>
                                        <td class="actions text-center"><?= __('Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($milestones as $milestone): ?>
                <tr>
                                        <td><?= $this->Number->format($milestone->id) ?></td>
                                        <td><?= h($milestone->title) ?></td>
                                        <td><?= h($milestone->start_date) ?></td>
                                        <td><?= h($milestone->end_date) ?></td>
                                        <td class="actions text-center">
                        <div class="btn-group">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $milestone->id], ['class' => 'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $milestone->id], ['class' => 'btn btn-xs btn-default']) ?>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete-<?= $milestone->id?>">Delete</button>

                        </div>
                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $milestone->id, 'name' => $milestone->id]); ?>
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
                <p><strong>You currently have now Milestones</strong></p>
                <p>To get started, click to button bellow and create new Milestone</p>
                <?= $this->Html->link(__('Add new Milestone'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- End page Content -->
