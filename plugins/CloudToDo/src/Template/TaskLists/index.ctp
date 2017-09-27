<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= __('Task Lists') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Task List'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Task Lists'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Task List'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

    </div>
</div>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">
        <?php if (count($taskLists) > 0) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <td><?= $this->Paginator->sort('id') ?></td>
                                <td><?= $this->Paginator->sort('name') ?></td>
                                <td><?= $this->Paginator->sort('description') ?></td>
                                <td><?= $this->Paginator->sort('user_id') ?></td>
                                <td>Tasks</td>
                                <td class="actions text-center"><?= __('Actions') ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($taskLists as $taskList): ?>
                                <tr>
                                    <td><i class="fa fa-check-square"></i> </td>
                                    <td><?= h($taskList->name) ?></td>
                                    <td><?= h($taskList->description) ?></td>
                                    <td>
                                        <?= $taskList->has('user') ? $this->Html->link($taskList->user->id, ['controller' => 'Users', 'action' => 'view', $taskList->user->id]) : '' ?>
                                    </td>
                                    <td><?= h($taskList->all_tasks_count) ?></td>
                                    <td class="actions text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $taskList->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taskList->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                                    data-target="#modal-delete-<?= $taskList->id ?>">Delete
                                            </button>

                                        </div>
                                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $taskList->id, 'name' => $taskList->id]); ?>
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
                            <p><strong>You currently have now Task Lists</strong></p>
                            <p>To get started, click to button bellow and create new Task List</p>
                            <?= $this->Html->link(__('Add new Task List'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
