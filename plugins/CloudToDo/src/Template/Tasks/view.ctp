<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= h($task->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id]) ?> </li>
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

             <div class="row" style="margin-bottom: 10px">
                 <div class="col-md-12">
                     <strong><label class="label label-info">Open</label> Text by Martin </strong>
                 </div>
             </div>

             <table class="table table-hover">
                                                                    <tr>
                     <th><?= __('Name') ?></th>
                     <td style="text-align: right"><?= h($task->name) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Description') ?></th>
                     <td style="text-align: right"><?= h($task->description) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('User') ?></th>
                     <td style="text-align: right"><?= $task->has('user') ? $this->Html->link($task->user->id, ['controller' => 'Users', 'action' => 'view', $task->user->id]) : '' ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Task List') ?></th>
                     <td style="text-align: right"><?= $task->has('task_list') ? $this->Html->link($task->task_list->name, ['controller' => 'TaskLists', 'action' => 'view', $task->task_list->id]) : '' ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($task->id) ?></td>
                 </tr>
                                                                                     <tr>
                     <th><?= __('Created') ?></th>
                     <td style="text-align: right"><?= h($task->created) ?></td>
                 </tr>
                                  <tr>
                     <th><?= __('Modified') ?></th>
                     <td style="text-align: right"><?= h($task->modified) ?></td>
                 </tr>
                                                                                     <tr>
                     <th><?= __('Done') ?></th>
                     <td style="text-align: right"><?= $task->done ? __('Yes') : __('No'); ?></td>
                 </tr>
                                               </table>



                                   </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
