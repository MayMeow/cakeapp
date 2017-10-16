<?php $this->extend('CakeMetronic./Common/_layout'); ?>

<?php $this->assign('page-title', 'Companies'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Company'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cube"></i></a></li>
    <li><a href="#">Resources</a></li>
    <li class="active"><label class="label label-default">Companies</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if (count($companies) > 0) : ?>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <td><?= $this->Paginator->sort('name') ?></td>
                         <td><?= $this->Paginator->sort('phone') ?></td>
                        <td class="actions text-center"><?= __('Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($companies as $company): ?>
                        <tr>
                            <td><label class="label label-info"><?= $this->Number->format($company->id) ?></label> <?= h($company->name) ?></td>
                            <td><?= h($company->phone) ?></td>
                            <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $company->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                            data-target="#modal-delete-<?= $company->id ?>">Delete
                                    </button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $company->id, 'name' => $company->id]); ?>
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
                    <p><strong>You currently have now Companies</strong></p>
                    <p>To get started, click to button bellow and create new Company</p>
                    <?= $this->Html->link(__('Add new Company'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<!-- End page Content -->
