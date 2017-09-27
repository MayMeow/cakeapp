<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= __('Access Tokens') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Access Token'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Access Tokens'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Access Token'), ['action' => 'add']) ?> </li>
                                                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                                                <li><?= $this->Html->link(__('List Auth Applications'), ['controller' => 'AuthApplications', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Auth Application'), ['controller' => 'AuthApplications', 'action' => 'add']) ?> </li>
                                            </ul>
                </div>
            </div>
        </h3>

    </div>
</div>

<!-- Begin page content -->
    <main id="main-container">

         <!-- Content -->
         <div class="container">
             <?php if(count($accessTokens) > 0) : ?>
             <div class="row">
                 <div class="col-md-12">

                     <div class="table-responsive">
                    <table class="table table-hover table-vcenter">
                        <thead>
                        <tr>
                                                        <td><?= $this->Paginator->sort('id') ?></td>
                                                        <td><?= $this->Paginator->sort('token') ?></td>
                                                        <td><?= $this->Paginator->sort('user_id') ?></td>
                                                        <td><?= $this->Paginator->sort('auth_application_id') ?></td>
                                                        <td><?= $this->Paginator->sort('expires') ?></td>
                                                        <td><?= $this->Paginator->sort('created') ?></td>
                                                        <td class="actions text-center"><?= __('Actions') ?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($accessTokens as $accessToken): ?>
                        <tr>
                                                        <td><?= $this->Number->format($accessToken->id) ?></td>
                                                        <td><?= h($accessToken->token) ?></td>
                                                        <td>
                                <?= $accessToken->has('user') ? $this->Html->link($accessToken->user->id, ['controller' => 'Users', 'action' => 'view', $accessToken->user->id]) : '' ?>
                            </td>
                                                        <td>
                                <?= $accessToken->has('auth_application') ? $this->Html->link($accessToken->auth_application->name, ['controller' => 'AuthApplications', 'action' => 'view', $accessToken->auth_application->id]) : '' ?>
                            </td>
                                                        <td><?= h($accessToken->expires) ?></td>
                                                        <td><?= h($accessToken->created) ?></td>
                                                        <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $accessToken->id], ['class' => 'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accessToken->id], ['class' => 'btn btn-xs btn-default']) ?>
                                        <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete-<?= $accessToken->id?>">Delete</button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $accessToken->id, 'name' => $accessToken->id]); ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                 </div>
             </div>
             <div class="row">
                    <div class="col-md-12">
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
                                        <p><strong>You currently have now Access Tokens</strong></p>
                                        <p>To get started, click to button bellow and create new Access Token</p>
                                        <?= $this->Html->link(__('Add new Access Token'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

         </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
