<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', 'Contacts'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Contact'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
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

<table class="table table-hover">
                <tr>
        <th><?= __('Name') ?></th>
        <td style="text-align: right"><?= h($contact->name) ?></td>
    </tr>
                <tr>
        <th><?= __('Description') ?></th>
        <td style="text-align: right"><?= h($contact->description) ?></td>
    </tr>
                <tr>
        <th><?= __('Email') ?></th>
        <td style="text-align: right"><?= h($contact->email) ?></td>
    </tr>
                <tr>
        <th><?= __('Website') ?></th>
        <td style="text-align: right"><?= h($contact->website) ?></td>
    </tr>
                <tr>
        <th><?= __('Phone') ?></th>
        <td style="text-align: right"><?= h($contact->phone) ?></td>
    </tr>
                <tr>
        <th><?= __('Mobile') ?></th>
        <td style="text-align: right"><?= h($contact->mobile) ?></td>
    </tr>
                <tr>
        <th><?= __('Address') ?></th>
        <td style="text-align: right"><?= h($contact->address) ?></td>
    </tr>
                <tr>
        <th><?= __('Zip') ?></th>
        <td style="text-align: right"><?= h($contact->zip) ?></td>
    </tr>
                <tr>
        <th><?= __('Country') ?></th>
        <td style="text-align: right"><?= h($contact->country) ?></td>
    </tr>
                <tr>
        <th><?= __('State') ?></th>
        <td style="text-align: right"><?= h($contact->state) ?></td>
    </tr>
                <tr>
        <th><?= __('Company') ?></th>
        <td style="text-align: right"><?= $contact->has('company') ? $this->Html->link($contact->company->name, ['controller' => 'Companies', 'action' => 'view', $contact->company->id]) : '' ?></td>
    </tr>
                            <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($contact->id) ?></td>
    </tr>
                    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($contact->created) ?></td>
    </tr>
        <tr>
        <th><?= __('Modified') ?></th>
        <td style="text-align: right"><?= h($contact->modified) ?></td>
    </tr>
            </table>



        
<!-- End page Content -->
