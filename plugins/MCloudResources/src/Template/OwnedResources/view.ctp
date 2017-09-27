<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3>Owned resources / <?= h($ownedResource->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Owned Resource'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Owned Resource'), ['action' => 'edit', $ownedResource->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Owned Resources'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Owned Resource'), ['action' => 'add']) ?> </li>
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

        <table class="table table-hover">
            <tr>
                <th><?= __('Name') ?></th>
                <td style="text-align: right"><?= h($ownedResource->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Resource Group') ?></th>
                <td style="text-align: right"><?= $ownedResource->has('resource_group') ? $this->Html->link($ownedResource->resource_group->name, ['controller' => 'ResourceGroups', 'action' => 'view', $ownedResource->resource_group->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Resource Class') ?></th>
                <td style="text-align: right"><?= $ownedResource->has('resource_class') ? $this->Html->link($ownedResource->resource_class->name, ['controller' => 'ResourceClasses', 'action' => 'view', $ownedResource->resource_class->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td style="text-align: right"><?= $ownedResource->has('user') ? $this->Html->link($ownedResource->user->id, ['controller' => 'Users', 'action' => 'view', $ownedResource->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($ownedResource->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Instance Key') ?></th>
                <td style="text-align: right"><?= $this->Number->format($ownedResource->instance_key) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($ownedResource->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($ownedResource->modified) ?></td>
            </tr>
        </table>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
