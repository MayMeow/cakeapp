<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= __('Issues') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Issue'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Issues'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Assignees'), ['controller' => 'Assignees', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Assignee'), ['controller' => 'Assignees', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Issue Comments'), ['controller' => 'IssueComments', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Issue Comment'), ['controller' => 'IssueComments', 'action' => 'add']) ?> </li>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Form</h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($issue, ['align' => [
                    'sm' => [
                        'left' => 6,
                        'middle' => 6,
                        'right' => 12
                    ],
                    'md' => [
                        'left' => 3,
                        'middle' => 9
                    ]
                ]]) ?>

                <div class="form-body">
                    <?php
                    echo $this->Form->input('title');
                    echo $this->Form->input('description');
                    echo $this->Form->input('due_date', ['empty' => true]);
                    echo $this->Form->input('estimate', ['disabled']);
                    echo $this->Form->input('finished');
                    echo $this->Form->input('user_id', ['options' => $users, 'disabled']);
                    echo $this->Form->input('labels._ids', ['type' => 'select', 'multiple' => true, 'options' => $labels]);
                    ?>
                </div>
                <div class="form-action">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn green']) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
