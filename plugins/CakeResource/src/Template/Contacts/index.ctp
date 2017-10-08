<?php $this->extend('CakeApp.Common/index'); ?>

<?php $this->assign('page-title', 'Contacts'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Contact'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cube"></i></a></li>
    <li><a href="#">Resources</a></li>
    <li class="active"><label class="label label-default">Contacts</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if (count($contacts) > 0) : ?>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <td><?= $this->Paginator->sort('name') ?></td>
                        <td><?= $this->Paginator->sort('description') ?></td>
                        <td><?= $this->Paginator->sort('email') ?></td>
                        <td><?= $this->Paginator->sort('mobile') ?></td>
                        <td class="actions text-center"><?= __('Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><label class="label label-info"><?= $this->Number->format($contact->id) ?></label> <?= h($contact->name) ?></td>
                            <td><?= h($contact->description) ?></td>
                            <td><?= h($contact->email) ?></td>
                            <td><?= h($contact->mobile) ?></td>
                            <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                            data-target="#modal-delete-<?= $contact->id ?>">Delete
                                    </button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $contact->id, 'name' => $contact->id]); ?>
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
                    <p><strong>You currently have now Contacts</strong></p>
                    <p>To get started, click to button bellow and create new Contact</p>
                    <?= $this->Html->link(__('Add new Contact'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<!-- End page Content -->
