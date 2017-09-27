<?php $this->extend('CakeApp.Common/view'); ?>

<?php $this->assign('page-title', 'Application'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Auth Application'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Auth Application'), ['action' => 'edit', $authApplication->id]) ?> </li>
        <li><?= $this->Html->link(__('List Auth Applications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auth Application'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Access Tokens'), ['controller' => 'AccessTokens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Access Token'), ['controller' => 'AccessTokens', 'action' => 'add']) ?> </li>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-shield"></i></a></li>
    <li><a href="#">IAM & Admin</a></li>
    <li><label class="label label-default">Applications</label></li>
</ol>
<?php $this->end() ?>

<!-- Begin page content -->

<table class="table table-hover">
    <tr>
        <th><?= __('Name') ?></th>
        <td style="text-align: right"><?= h($authApplication->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Client Key') ?></th>
        <td style="text-align: right"><?= h($authApplication->client_key) ?></td>
    </tr>
    <tr>
        <th><?= __('Client Secret') ?></th>
        <td style="text-align: right"><?= h($authApplication->client_secret) ?></td>
    </tr>
    <tr>
        <th><?= __('Homepage Url') ?></th>
        <td style="text-align: right"><?= h($authApplication->homepage_url) ?></td>
    </tr>
    <tr>
        <th><?= __('Callback Url') ?></th>
        <td style="text-align: right"><?= h($authApplication->callback_url) ?></td>
    </tr>
    <tr>
        <th><?= __('User') ?></th>
        <td style="text-align: right"><?= $authApplication->has('user') ? $this->Html->link($authApplication->user->id, ['controller' => 'Users', 'action' => 'view', $authApplication->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($authApplication->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($authApplication->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modified') ?></th>
        <td style="text-align: right"><?= h($authApplication->modified) ?></td>
    </tr>
</table>


<div class="">
    <h4><?= __('Description') ?></h4>
    <?= $this->Text->autoParagraph(h($authApplication->description)); ?>
</div>
<div class="related">
    <?php if (!empty($authApplication->access_tokens)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title"><?= __('Related Access Tokens') ?>
                    <?= $this->Html->link(__('CREATE'), ['controller' => 'AccessTokens', 'action' => 'add']) ?>
                </h4>
            </div>
            <table class="table table-hover">
                <tr>
                    <td><?= __('Id') ?></td>
                    <td><?= __('Token') ?></td>
                    <td><?= __('Expires') ?></td>
                    <td><?= __('Created') ?></td>
                    <td class="actions"><?= __('Actions') ?></td>
                </tr>
                <?php foreach ($authApplication->access_tokens as $accessTokens): ?>
                    <tr>
                        <td><?= h($accessTokens->id) ?></td>
                        <td><?= h($accessTokens->token) ?></td>
                        <td><?= h($accessTokens->expires) ?></td>
                        <td><?= h($accessTokens->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'AccessTokens', 'action' => 'view', $accessTokens->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'AccessTokens', 'action' => 'edit', $accessTokens->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'AccessTokens', 'action' => 'delete', $accessTokens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessTokens->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>

    <?php endif; ?>

    <?= $this->Cell('Docs', ['Auth/Api']); ?>
</div>

<!-- End page Content -->
