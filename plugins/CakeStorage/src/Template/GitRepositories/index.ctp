<?php $this->extend('CakeApp.Common/index'); ?>

<?php $this->assign('page-title', 'Repositories'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Git Repository'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Git Repositories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Git Repository'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-server"></i></a></li>
    <li><a href="#">Storage</a></li>
    <li><a href="#"><label class="label label-default"><i class="fab fa-git"></i> Repositories</label></a></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->
<div class="row">
    <div class="col-md-12">
        <?php if (count($gitRepositories) > 0) : ?>

        <ul class="projects-list">
            <?php foreach ($gitRepositories as $gitRepository): ?>
                <li class="project-row">
                    <div style="margin-right: 10px">
                        <div class="avatar-circle bg-amethyst">
                            <span class="avatar-content"><?= substr($gitRepository->name, 0, 2) ?></span>
                        </div>
                    </div>
                    <div style="margin-right: 10px">
                        <strong>
                            <a href="<?= $this->Url->build(['action' => 'view', $gitRepository->namespace, $gitRepository->slug, 'tree']) ?>">
                                <?= $gitRepository->namespace ?> /
                                <strong><?= $gitRepository->slug ?></strong>
                            </a>
                        </strong>
                        <div>
                            <?= $this->Emoji->parse($gitRepository->description) ?>
                        </div>
                    </div>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>

    <div class="row">
        <div class="col-md-12 text-center">
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
                    <p><strong>You currently have now Git Repositories</strong></p>
                    <p>To get started, click to button bellow and create new Git Repository</p>
                    <?= $this->Html->link(__('Add new Git Repository'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<!-- End page Content -->
