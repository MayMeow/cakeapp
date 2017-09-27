<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-codepen"></i> Devices / <?= h($device->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?> </li>
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

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-12">
                <a href="<?= $this->Url->build(['action' => 'stop', $device->id]) ?>" class="btn btn-default pull-right"><i class="fa fa-stop"></i> Stop</a>
                <ul class="nav nav-pills">
                    <li role="presentation" class="<?= $view_part == 'streams' ? 'active': '' ?>"><a href="<?= $this->Url->build(['action' => 'view', $device->id, 'streams']) ?>">Streams</a></li>
                    <li role="presentation" class="<?= $view_part == 'configure' ? 'active': '' ?>"><a href="<?= $this->Url->build(['action' => 'view', $device->id, 'configure']) ?>">Configure</a></li>
                </ul>
            </div>
        </div>

        <?= $this->element('MCloudHome.device_' . $view_part) ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
