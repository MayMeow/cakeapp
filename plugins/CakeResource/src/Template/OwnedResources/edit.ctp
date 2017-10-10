<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-cubes"></i> Resources / <?= __('Owned Resources') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Owned Resource'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Owned Resources'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('List Resource Groups'), ['controller' => 'ResourceGroups', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Resource Group'), ['controller' => 'ResourceGroups', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Resource Classes'), ['controller' => 'ResourceClasses', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Resource Class'), ['controller' => 'ResourceClasses', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('MCloudResources.admin_menu') ?>

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
                <?= $this->Form->create($ownedResource, ['align' => [
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
                    echo $this->Form->input('resource_group_id', ['options' => $resourceGroups]);
                    echo $this->Form->input('resource_class_id', ['options' => $resourceClasses]);
                    echo $this->Form->input('user_id', ['options' => $users]);
                    echo $this->Form->input('instance_key');
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
