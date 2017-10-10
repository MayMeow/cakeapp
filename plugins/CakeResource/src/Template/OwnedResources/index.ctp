<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-cubes"></i> Resources / <?= __('Owned Resources') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Owned Resource'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Owned Resources'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Owned Resource'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Resource Groups'), ['controller' => 'ResourceGroups', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Resource Group'), ['controller' => 'ResourceGroups', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Resource Classes'), ['controller' => 'ResourceClasses', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Resource Class'), ['controller' => 'ResourceClasses', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('MCloudResources.admin_menu') ?>

    </div>
</div>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">
        <?php if (count($ownedResources) > 0) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <td><?= $this->Paginator->sort('id') ?></td>
                                <td>
                                    <?= $this->Paginator->sort('name') ?>
                                </td>
                                <td><?= $this->Paginator->sort('resource_class_id') ?></td>
                                <td><?= $this->Paginator->sort('user_id') ?></td>
                                <td><?= $this->Paginator->sort('instance_key') ?></td>
                                <td><?= $this->Paginator->sort('created') ?></td>
                                <td class="actions text-center"><?= __('Actions') ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ownedResources as $ownedResource): ?>
                                <tr>
                                    <td><?= $this->Number->format($ownedResource->id) ?></td>
                                    <td>
                                        <strong><i class="fa fa-<?= h($ownedResource->resource_class->icon) ?> text-amethyst"></i></strong>
                                        <?= h($ownedResource->name) ?>
                                    </td>
                                    <td>
                                        <?= $ownedResource->has('resource_class') ? $this->Html->link($ownedResource->resource_class->name, ['controller' => 'ResourceClasses', 'action' => 'view', $ownedResource->resource_class->id]) : '' ?>
                                    </td>
                                    <td>
                                        <?= $ownedResource->has('user') ? $this->Html->link($ownedResource->user->id, ['controller' => 'Users', 'action' => 'view', $ownedResource->user->id]) : '' ?>
                                    </td>
                                    <td><?= $this->Number->format($ownedResource->instance_key) ?></td>
                                    <td><?= h($ownedResource->created) ?></td>
                                    <td class="actions text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(__('Go'), ['plugin' => $ownedResource->resource_class->package, 'controller' => $ownedResource->resource_class->ctrl, 'action' => 'view', $ownedResource->instance_key], ['class' => 'btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $ownedResource->id], ['class' => 'btn btn-xs btn-default']) ?>
                                        </div>
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
                            <p><strong>You currently have now Owned Resources</strong></p>
                            <p>To get started, click to button bellow and create new Owned Resource</p>
                            <?= $this->Html->link(__('Add new Owned Resource'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
