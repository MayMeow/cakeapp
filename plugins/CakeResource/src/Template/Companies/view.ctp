<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', 'Companies'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Company'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
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

<table class="table table-hover">
                <tr>
        <th><?= __('Name') ?></th>
        <td style="text-align: right"><?= h($company->name) ?></td>
    </tr>
                <tr>
        <th><?= __('Website') ?></th>
        <td style="text-align: right"><?= h($company->website) ?></td>
    </tr>
                <tr>
        <th><?= __('Phone') ?></th>
        <td style="text-align: right"><?= h($company->phone) ?></td>
    </tr>
                <tr>
        <th><?= __('Mobile') ?></th>
        <td style="text-align: right"><?= h($company->mobile) ?></td>
    </tr>
                <tr>
        <th><?= __('Address') ?></th>
        <td style="text-align: right"><?= h($company->address) ?></td>
    </tr>
                <tr>
        <th><?= __('Zip') ?></th>
        <td style="text-align: right"><?= h($company->zip) ?></td>
    </tr>
                <tr>
        <th><?= __('Vat') ?></th>
        <td style="text-align: right"><?= h($company->vat) ?></td>
    </tr>
                <tr>
        <th><?= __('Country') ?></th>
        <td style="text-align: right"><?= h($company->country) ?></td>
    </tr>
                <tr>
        <th><?= __('State') ?></th>
        <td style="text-align: right"><?= h($company->state) ?></td>
    </tr>
                            <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($company->id) ?></td>
    </tr>
                    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($company->created) ?></td>
    </tr>
        <tr>
        <th><?= __('Modified') ?></th>
        <td style="text-align: right"><?= h($company->modified) ?></td>
    </tr>
            </table>



        <div class="related">
    <?php if (!empty($company->contacts)): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title"><?= __('Related Contacts') ?>
                         <?= $this->Html->link(__('CREATE'), ['controller' => 'Contacts', 'action' => 'add']) ?>
            </h4>
        </div>
        <table class="table table-hover">
            <tr>
                                <td><?= __('Id') ?></td>
                                <td><?= __('Name') ?></td>
                                <td><?= __('Description') ?></td>
                                <td><?= __('Email') ?></td>
                                <td><?= __('Website') ?></td>
                                <td><?= __('Phone') ?></td>
                                <td><?= __('Mobile') ?></td>
                                <td><?= __('Address') ?></td>
                                <td><?= __('Zip') ?></td>
                                <td><?= __('Country') ?></td>
                                <td><?= __('State') ?></td>
                                <td><?= __('Company Id') ?></td>
                                <td><?= __('Created') ?></td>
                                <td><?= __('Modified') ?></td>
                                <td class="actions"><?= __('Actions') ?></td>
            </tr>
            <?php foreach ($company->contacts as $contacts): ?>
            <tr>
                <td><?= h($contacts->id) ?></td>
                <td><?= h($contacts->name) ?></td>
                <td><?= h($contacts->description) ?></td>
                <td><?= h($contacts->email) ?></td>
                <td><?= h($contacts->website) ?></td>
                <td><?= h($contacts->phone) ?></td>
                <td><?= h($contacts->mobile) ?></td>
                <td><?= h($contacts->address) ?></td>
                <td><?= h($contacts->zip) ?></td>
                <td><?= h($contacts->country) ?></td>
                <td><?= h($contacts->state) ?></td>
                <td><?= h($contacts->company_id) ?></td>
                <td><?= h($contacts->created) ?></td>
                <td><?= h($contacts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contacts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contacts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
</div>
    
<!-- End page Content -->
