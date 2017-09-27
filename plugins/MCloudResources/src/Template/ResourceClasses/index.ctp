<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-cubes"></i> Resources / <?= __('Resource Classes') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Resource Class'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Resource Classes'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Resource Class'), ['action' => 'add']) ?> </li>
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
        <?php if (count($resourceClasses) > 0) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <td><?= $this->Paginator->sort('id') ?></td>
                                <td><?= $this->Paginator->sort('name') ?></td>
                                <td><?= $this->Paginator->sort('uname') ?></td>
                                <td><?= $this->Paginator->sort('developer') ?></td>
                                <td class="actions text-center"><?= __('Actions') ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($resourceClasses as $resourceClass): ?>
                                <tr>
                                    <td><?= $this->Number->format($resourceClass->id) ?></td>
                                    <td>
                                        <strong><i
                                                class="fa fa-<?= h($resourceClass->icon) ?> text-amethyst"></i></strong>
                                        <?= h($resourceClass->name) ?>
                                    </td>
                                    <td><?= h($resourceClass->uname) ?></td>
                                    <td><?= h($resourceClass->developer) ?></td>
                                    <td class="actions text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(__('Create'), ['plugin' => $resourceClass->package, 'controller' => $resourceClass->ctrl, 'action' => 'add'], ['class' => 'btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $resourceClass->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resourceClass->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                                    data-target="#modal-delete-<?= $resourceClass->id ?>">Delete
                                            </button>

                                        </div>
                                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $resourceClass->id, 'name' => $resourceClass->id]); ?>
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
                            <p><strong>You currently have now Resource Classes</strong></p>
                            <p>To get started, click to button bellow and create new Resource Class</p>
                            <?= $this->Html->link(__('Add new Resource Class'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
