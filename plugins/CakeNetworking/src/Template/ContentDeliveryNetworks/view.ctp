<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3>Content Delivery Networks / <?= h($contentDeliveryNetwork->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Content Delivery Network'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Content Delivery Network'), ['action' => 'edit', $contentDeliveryNetwork->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Content Delivery Networks'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Content Delivery Network'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Buckets'), ['controller' => 'Buckets', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Bucket'), ['controller' => 'Buckets', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('CakeNetworking.admin_menu') ?>

    </div>
</div>


<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <table class="table table-hover">
            <tr>
                <th><?= __('Name') ?></th>
                <td style="text-align: right"><?= h($contentDeliveryNetwork->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Bucket') ?></th>
                <td style="text-align: right"><?= $contentDeliveryNetwork->has('bucket') ? $this->Html->link($contentDeliveryNetwork->bucket->name, ['controller' => 'Buckets', 'action' => 'view', $contentDeliveryNetwork->bucket->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td style="text-align: right"><?= $contentDeliveryNetwork->has('user') ? $this->Html->link($contentDeliveryNetwork->user->id, ['controller' => 'Users', 'action' => 'view', $contentDeliveryNetwork->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($contentDeliveryNetwork->id) ?></td>
            </tr>
            <tr>
                <th><?= __('CDN Url') ?></th>
                <td style="text-align: right"><?= $externalUrl ?>/static/<?= $this->Number->format($contentDeliveryNetwork->id) ?>/<span class="text-info">path/to/file</span></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($contentDeliveryNetwork->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($contentDeliveryNetwork->modified) ?></td>
            </tr>
        </table>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
