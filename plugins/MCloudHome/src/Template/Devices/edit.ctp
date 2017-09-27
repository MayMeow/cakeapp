<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><?= __('Devices') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
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
        <h4 class="page-header">Device</h4>
        <div class="row">
            <div class="col-md-12">
                <?= $this->Form->create($device, ['align' => [
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
                    echo $this->Form->input('socket', ['prepend' => 'tcp://']);
                    echo $this->Form->input('app_key', ['disabled']);
                    echo $this->Form->input('app_secret', ['disabled']);
                    echo $this->Form->input('agent_type', ['help' => 'Allowed agent types: audio']);
                    ?>
                </div>
                <div class="form-action">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>

            </div>
        </div>

        <h4 class="page-header">Trouble shooting</h4>
        <div class="row">
            <div class="col-md-3">
                In case of the agent does not react.
            </div>
            <div class="col-md-9">
                <a href="<?= $this->Url->build(['action' => 'restart', $device->id]) ?>" class="btn btn-primary btn-sm">Reboot agent</a>
            </div>
        </div>

        <h4 class="page-header">Delete device</h4>
        <div class="row">
            <div class="col-md-3">
                Deleted devices cannot be restored.
            </div>
            <div class="col-md-9">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">Danger zone</h4>
                    </div>
                    <div class="panel-body">
                        <p class="text-danger">Following action will delete <strong><?= $device->name ?></strong> agent. This action cannot be undone.</p>
                        <a href="#" class="btn btn-danger">Delete device</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
