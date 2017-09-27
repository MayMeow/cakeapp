<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', 'Repository'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Git Repository'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= $this->Html->link(__('<i class="fa fa-level-up"></i>'), ['action' => 'index'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Git Repository'), ['action' => 'edit', $gitRepository->id]) ?> </li>
        <li><?= $this->Html->link(__('List Git Repositories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Git Repository'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fab fa-git"></i></a></li>
    <li><a href="#"><?= $gitRepository->namespace ?> <i class="fa fa-user-circle"></i></a></li>
    <li class="active"><label class="label label-default"><?= h($gitRepository->name) ?></label></li>
</ol>
<?php $this->end() ?>

<?php $this->start('projects-navigation'); ?>
<?= $this->Element('CakeApp.projects-nav', ['navItems' => $view_menu]) ?>
<?php $this->end() ?>

<?php $this->start('projects-description'); ?>
<div class="border-bottom-gray project-description">
    <div class="container">
        <div style="padding-top: 16px; padding-bottom: 10px; font-size: 1.17em">
            <?= $this->Emoji->parse($gitRepository->description) ?>
        </div>
        <div>
            <div class="input-group">
                <input title="clone" type="text" class="form-control input-sm" value="<?= $viewSack->get('clone') ?>" readonly>
                <div class="input-group-btn">
                    <a href="#" class="btn btn-sm btn-default"><i class="fa fa-clone"></i> Clone</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->end() ?>

<!-- Begin page content -->

<div class="related">

    <?= $this->cell('CakeStorage.Projects::commits', [$viewSack->get('projectWithNamespace'), $viewSack->get('ref')]) ?>

</div>

<!-- End page Content -->





















