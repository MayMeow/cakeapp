<?php $this->extend('CakeMetronic./Common/_layout'); ?>

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

<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        Contacts of known people. They can be used in some function to send emails.
    </div>
</div>

<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <div class="m-portlet__head-text">
                    Contacts index
                </div>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">

        <div class="m-section">
            <div class="m-section__content">
                <table class="table m-table hs_table-striped table-hover">
                    <thead class="thead-default">
                    <tr>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('description') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('mobile') ?></th>
                        <th class="actions text-center"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><label class="label label-info"><?= $this->Number->format($contact->id) ?></label> <?= h($contact->name) ?></td>
                            <td><?= h($contact->description) ?></td>
                            <td><?= h($contact->email) ?></td>
                            <td><?= h($contact->mobile) ?></td>
                            <td class="text-center">
                                <?= $this->element('CakeMetronic.Table/_actions', ['id' => $contact->id])?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php if (count($contacts) > 0) : ?>
    <div class="row">
        <div class="col-md-12">



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
