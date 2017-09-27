<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><?= __('Certificates') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Certificate'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('List Parent Certificates'), ['controller' => 'Certificates', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Parent Certificate'), ['controller' => 'Certificates', 'action' => 'add']) ?> </li>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">New Certificate</h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($certificate, ['align' => [
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
                    <h4 class="page-header">Basic information</h4>
                    <?php
                    echo $this->Form->input('internal_name', ['help' => 'Just for more user friendly name.']);
                    echo $this->Form->input('common_name');
                    echo $this->Form->input('email');
                    ?> <h4 class="page-header">Locality information</h4> <?php
                    echo $this->Form->input('country');
                    echo $this->Form->input('province');
                    echo $this->Form->input('locality');
                    ?> <h4 class="page-header">Organization information</h4> <?php
                    echo $this->Form->input('organization', ['help' => 'Intermediate CA and Root CA must have same organization']);
                    echo $this->Form->input('organization_unit');
                    ?> <h4 class="page-header">Settings</h4> <?php
                    echo $this->Form->input('type', ['help' => 'Root Ca = ca, Intermediate CA = intermediate, User Certificate = user']);
                    echo $this->Form->input('parent_id', ['options' => $parentCertificates, 'empty' => true, 'help' => 'Select certificate authority to sign your new certificate, Not required for type: ca']);
                    echo $this->Form->input('ca', ['help' => 'Check if you want to allow sign other certificates. Type must be: CA or Intermediate CA']);
                    ?>
                </div>


            </div>
            <div class="panel-footer">
                <div class="form-action">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <?= $this->Form->button(__('Create certificate'), ['class' => 'btn btn-success']) ?>
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
