<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= h($accessToken->id) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Access Token'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Access Token'), ['action' => 'edit', $accessToken->id]) ?> </li>
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

             <table class="table table-hover">
                                                                    <tr>
                     <th><?= __('Token') ?></th>
                     <td style="text-align: right"><?= h($accessToken->token) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('User') ?></th>
                     <td style="text-align: right"><?= $accessToken->has('user') ? $this->Html->link($accessToken->user->id, ['controller' => 'Users', 'action' => 'view', $accessToken->user->id]) : '' ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Auth Application') ?></th>
                     <td style="text-align: right"><?= $accessToken->has('auth_application') ? $this->Html->link($accessToken->auth_application->name, ['controller' => 'AuthApplications', 'action' => 'view', $accessToken->auth_application->id]) : '' ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($accessToken->id) ?></td>
                 </tr>
                                                                                     <tr>
                     <th><?= __('Expires') ?></th>
                     <td style="text-align: right"><?= h($accessToken->expires) ?></td>
                 </tr>
                                  <tr>
                     <th><?= __('Created') ?></th>
                     <td style="text-align: right"><?= h($accessToken->created) ?></td>
                 </tr>
                                                                </table>



                                   </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
