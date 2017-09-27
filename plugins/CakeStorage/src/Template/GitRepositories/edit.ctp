<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><?= __('Git Repositories') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Git Repository'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Git Repositories'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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
        <h3 class="page-header">Edit repository</h3>
        <?= $this->Form->create($gitRepository, ['align' => [
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
            echo $this->Form->input('name');
            //echo $this->Form->input('slug');
            echo $this->Form->input('description');
            echo $this->Form->input('namespace');
            //echo $this->Form->input('uid');
            echo $this->Form->input('default_branch');
            //echo $this->Form->input('user_id', ['options' => $users]);
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
        <h3 class="page-header text-danger">Delete repository</h3>
        <div class="row">
            <div class="col-md-3">
                Here you can delete your repository. <span class="text-danger">Following action cannot be undone.</span>
            </div>
            <div class="col-md-9">
                <button class="btn btn-danger" type="button" data-toggle="modal"
                        data-target="#modal-delete-<?= $gitRepository->id ?>">Delete
                </button>
                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $gitRepository->id, 'name' => $gitRepository->slug]); ?>
            </div>
        </div>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
