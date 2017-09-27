<?php $this->extend('CakeApp.Common/view'); ?>

<?php $this->assign('page-title', 'Issues'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Issue'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Issues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignees'), ['controller' => 'Assignees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignee'), ['controller' => 'Assignees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Issue Comments'), ['controller' => 'IssueComments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issue Comment'), ['controller' => 'IssueComments', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-clipboard"></i></a></li>
    <li><a href="#">Service desk</i></a></li>
    <li class="active"><label class="label label-default">Issues</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->
<?php if (count($issues) > 0) : ?>
    <div class="row text-center">
        <div class="col-md-12">
            <div class="btn-group">
                <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-info btn-sm">List</a>
                <a href="<?= $this->Url->build(['action' => 'board']) ?>" class="btn btn-default btn-sm">Board</a>
            </div>

            <div class="btn-group">
                <a href="#" class="btn btn-default btn-sm">All</a>
                <a href="#" class="btn btn-default btn-sm">Active</a>
                <a href="#" class="btn btn-default btn-sm">Closed</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <td></td>
                        <td><?= $this->Paginator->sort('title') ?></td>
                        <td class="actions text-center col-md-2"><?= __('Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($issues as $issue): ?>
                        <tr class="<?= $issue->finished ? 'text-muted' : '' ?>">
                            <td width="20px">
                                <i class="fa fa-exclamation <?= $issue->finished ? '' : 'text-success' ?>"></i>
                            </td>

                            <td>
                                <span>
                                    <strong><?= $this->Emoji->parse($issue->title) ?></strong>
                                    <?php foreach ($issue->labels as $label): ?>
                                        <label class="label <?= $label->label_class ?>"><?= $label->name ?></label>
                                    <?php endforeach; ?>
                                </span> <br/>
                                <small>
                                    #<?= $this->Number->format($issue->id) ?>
                                    by <?= $issue->has('user') ? $this->Html->link($issue->user->username, ['controller' => 'Users', 'action' => 'view', $issue->user->id]) : '' ?>
                                    , <?= h($issue->created) ?>
                                </small>
                            </td>

                            <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $issue->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $issue->id], ['class' => 'btn btn-xs btn-default']) ?>
                                    <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                            data-target="#modal-delete-<?= $issue->id ?>">Delete
                                    </button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $issue->id, 'name' => $issue->id]); ?>
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
                    <p><strong>You currently have now Issues</strong></p>
                    <p>To get started, click to button bellow and create new Issue</p>
                    <?= $this->Html->link(__('Add new Issue'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<!-- End page Content -->



