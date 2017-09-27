<?php $this->extend('CakeApp.Common/view'); ?>

<?php $this->assign('page-title', 'card->name'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id]) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<?php $this->end() ?>

<!-- Begin page content -->

<table class="table table-hover">
    <tr>
        <th><?= __('Name') ?></th>
        <td style="text-align: right"><?= h($card->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($card->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($card->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modified') ?></th>
        <td style="text-align: right"><?= h($card->modified) ?></td>
    </tr>
    <tr>
        <th><?= __('Webhook') ?></th>
        <td style="text-align: right"><?= $card->webhook ? __('Yes') : __('No'); ?></td>
    </tr>
</table>


<div class="">
    <h4><?= __('Json Data') ?></h4>
    <?= $this->Text->autoParagraph(h($card->json_data)); ?>
</div>

<!-- End page Content -->
