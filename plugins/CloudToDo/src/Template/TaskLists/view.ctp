<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= h($taskList->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Task List'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Task List'), ['action' => 'edit', $taskList->id]) ?> </li>
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

        <table class="table table-hover">
            <tr>
                <th><?= __('Name') ?></th>
                <td style="text-align: right"><?= h($taskList->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Description') ?></th>
                <td style="text-align: right"><?= h($taskList->description) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td style="text-align: right"><?= $taskList->has('user') ? $this->Html->link($taskList->user->id, ['controller' => 'Users', 'action' => 'view', $taskList->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($taskList->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($taskList->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($taskList->modified) ?></td>
            </tr>
            <tr>
                <th><?= __('All Tasks') ?></th>
                <td style="text-align: right"><?= h($taskList->all_tasks_count) ?></td>
            </tr>
            <tr>
                <th><?= __('Done Tasks') ?></th>
                <td style="text-align: right"><?= h($taskList->done_tasks_count) ?></td>
            </tr>
        </table>


        <div class="related">
            <?php if (!empty($taskList->tasks)): ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= __('Related Tasks') ?>
                            <?= $this->Html->link(__('CREATE'), ['controller' => 'Tasks', 'action' => 'add']) ?>
                        </h4>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <td><i class="fa fa-circle-o"></i></td>
                            <td><?= __('Name') ?></td>
                            <td><?= __('Description') ?></td>
                            <td><?= __('User Id') ?></td>
                            <td><?= __('Task List Id') ?></td>
                            <td><?= __('Created') ?></td>
                            <td><?= __('Modified') ?></td>
                            <td class="actions"><?= __('Actions') ?></td>
                        </tr>
                        <?php foreach ($taskList->tasks as $tasks): ?>
                            <tr>
                                <td><?= $tasks->done ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-circle-o"></i>'; ?></td>
                                <td><?= h($tasks->name) ?></td>
                                <td><?= h($tasks->description) ?></td>
                                <td><?= h($tasks->user_id) ?></td>
                                <td><?= h($tasks->task_list_id) ?></td>
                                <td><?= h($tasks->created) ?></td>
                                <td><?= h($tasks->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
