<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-diamond text-amethyst"></i> Users / <?= h($user->username) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
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

        <table class="table table-hover">
            <tr>
                <th><?= __('Username') ?></th>
                <td style="text-align: right"><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Password') ?></th>
                <td style="text-align: right"><?= h($user->password) ?></td>
            </tr>
            <tr>
                <th><?= __('Role') ?></th>
                <td style="text-align: right"><?= h($user->role) ?></td>
            </tr>
            <tr>
                <th><?= __('Uid') ?></th>
                <td style="text-align: right"><?= h($user->uid) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td style="text-align: right"><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Password reset requested') ?></th>
                <td style="text-align: right"><?= h($user->password_reset) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($user->modified) ?></td>
            </tr>
            <tr>
                <th><?= __('Verified') ?></th>
                <td style="text-align: right"><?= $user->verified ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
