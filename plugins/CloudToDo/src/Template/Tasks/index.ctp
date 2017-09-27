<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= __('Tasks') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Task Lists'), ['controller' => 'TaskLists', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Task List'), ['controller' => 'TaskLists', 'action' => 'add']) ?> </li>
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
        <?php if (count($tasks) > 0) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <td>
                                    <i class="fa fa-circle-o"></i>
                                </td>
                                <td><?= $this->Paginator->sort('name') ?></td>
                                <td><?= $this->Paginator->sort('description') ?></td>
                                <td><?= $this->Paginator->sort('user_id') ?></td>
                                <td><?= $this->Paginator->sort('task_list_id') ?></td>
                                <td><?= $this->Paginator->sort('created') ?></td>
                                <td class="actions text-center"><?= __('Actions') ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tasks as $task): ?>
                                <tr>
                                    <td>
                                        <?= $task->done ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-circle-o"></i>'; ?>
                                    </td>
                                    <td>
                                        <?= h($task->name) ?><br />
                                        <small>in <?= $task->has('task_list') ? $this->Html->link($task->task_list->name, ['controller' => 'TaskLists', 'action' => 'view', $task->task_list->id]) : '' ?></small>
                                    </td>
                                    <td><?= h($task->description) ?></td>
                                    <td>
                                        <?= $task->has('user') ? $this->Html->link($task->user->id, ['controller' => 'Users', 'action' => 'view', $task->user->id]) : '' ?>
                                    </td>
                                    <td>
                                        <?= $task->has('task_list') ? $this->Html->link($task->task_list->name, ['controller' => 'TaskLists', 'action' => 'view', $task->task_list->id]) : '' ?>
                                    </td>
                                    <td><?= h($task->created) ?></td>
                                    <td class="actions text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $task->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id], ['class' => 'btn btn-xs btn-default']) ?>
                                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                                    data-target="#modal-delete-<?= $task->id ?>">Delete
                                            </button>

                                        </div>
                                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => $task->id, 'name' => $task->id]); ?>
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
                            <p><strong>You currently have now Tasks</strong></p>
                            <p>To get started, click to button bellow and create new Task</p>
                            <?= $this->Html->link(__('Add new Task'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
