<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', 'milestone->title'); ?>

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
        <li><?= $this->Html->link(__('Edit Milestone'), ['action' => 'edit', $milestone->id]) ?> </li>
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

<table class="table table-hover">
                <tr>
        <th><?= __('Title') ?></th>
        <td style="text-align: right"><?= h($milestone->title) ?></td>
    </tr>
                            <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($milestone->id) ?></td>
    </tr>
                    <tr>
        <th><?= __('Start Date') ?></th>
        <td style="text-align: right"><?= h($milestone->start_date) ?></td>
    </tr>
        <tr>
        <th><?= __('End Date') ?></th>
        <td style="text-align: right"><?= h($milestone->end_date) ?></td>
    </tr>
            </table>



        <div class="">
    <h4><?= __('Description') ?></h4>
    <?= $this->Text->autoParagraph(h($milestone->description)); ?>
</div>
            
<!-- End page Content -->
