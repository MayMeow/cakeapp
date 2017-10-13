<?php $this->extend('CakeMetronic./Common/_layout'); ?>

<?php $this->assign('page-title', 'cloudLog->id'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Cloud Log'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Cloud Log'), ['action' => 'edit', $cloudLog->id]) ?> </li>
        <li><?= $this->Html->link(__('List Cloud Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cloud Log'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cube"></i></a></li>
    <li><a href="#">Cake Logs</a></li>
    <li class="active"><label class="label label-default">Logs</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<table class="table table-hover">
    <tr>
        <th><?= __('Resource Key') ?></th>
        <td style="text-align: right"><?= h($cloudLog->resource_key) ?></td>
    </tr>
    <tr>
        <th><?= __('Event Type') ?></th>
        <td style="text-align: right"><?= h($cloudLog->event_type) ?></td>
    </tr>
    <tr>
        <th><?= __('Severity') ?></th>
        <td style="text-align: right"><?= h($cloudLog->severity) ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($cloudLog->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($cloudLog->created) ?></td>
    </tr>
</table>


<div>
    <h4><?= __('Json Data') ?></h4>
    <pre style="word-break: break-all">
        <?= $this->Text->autoParagraph(h($cloudLog->json_data)); ?>
    </pre>
</div>

<div id="logData">
    <table class="table table-hover">
        <?php foreach ($logData as $key => $value) : ?>
            <tr>
                <th><?= $key ?></th>
                <td style="text-align: right"><?= h($value) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- End page Content -->
