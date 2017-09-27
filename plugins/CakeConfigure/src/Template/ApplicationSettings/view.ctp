<?php $this->extend('CakeApp.Common/view'); ?>

<?php $this->assign('page-title', 'applicationSetting->id'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Application Setting'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Application Setting'), ['action' => 'edit', $applicationSetting->id]) ?> </li>
        <li><?= $this->Html->link(__('List Application Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application Setting'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<?php $this->end() ?>

<!-- Begin page content -->

<table class="table table-hover">
    <tr>
        <th><?= __('Config Key') ?></th>
        <td style="text-align: right"><?= h($applicationSetting->config_key) ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($applicationSetting->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($applicationSetting->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modified') ?></th>
        <td style="text-align: right"><?= h($applicationSetting->modified) ?></td>
    </tr>
</table>


<div class="" style="word-break: break-all">
    <h4><?= __('Config Value') ?></h4>
    <?= $this->Text->autoParagraph(h($applicationSetting->config_value)); ?>
</div>

<!-- End page Content -->
