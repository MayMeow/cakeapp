<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

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
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <h4 class="panel-title">Form</h4>
                 </div>
                 <div class="panel-body">
                     <?= $this->Form->create($accessToken, ['align' => [
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
                                                  //echo $this->Form->input('token');
                                                  echo $this->Form->input('user_id', ['options' => $users]);
                                                  echo $this->Form->input('auth_application_id', ['options' => $authApplications]);
                                                  //echo $this->Form->input('expires');
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
