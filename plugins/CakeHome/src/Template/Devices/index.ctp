<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-home"></i> Home Cloud / <?= __('Devices') ?> <small><label class="label label-danger">Beta</label></small>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>

    </div>
</div>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">
        <?php if (count($devices) > 0) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <td><?= $this->Paginator->sort('name') ?></td>
                                <td><?= $this->Paginator->sort('socket') ?></td>
                                <td><?= $this->Paginator->sort('agent_type') ?></td>
                                <td><?= $this->Paginator->sort('created') ?></td>
                                <td class="actions text-center"><?= __('Actions') ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($devices as $device): ?>
                                <tr>
                                    <td>
                                        <i class="fa fa-codepen text-amethyst"></i>
                                        <?= $this->Html->link($device->name, ['action' => 'view', $device->id]) ?>
                                    </td>
                                    <td><?= h($device->socket) ?></td>
                                    <td><?= h($device->agent_type) ?></td>
                                    <td><?= h($device->created) ?></td>
                                    <td class="actions text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $device->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $device->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                                    data-target="#modal-delete-<?= $device->id ?>">Delete
                                            </button>

                                        </div>
                                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $device->id, 'name' => $device->id]); ?>
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
                            <p><strong>You currently have now Devices</strong></p>
                            <p>To get started, click to button bellow and create new Device</p>
                            <?= $this->Html->link(__('Add new Device'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
