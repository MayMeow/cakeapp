<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><?= h($outgoingAction->id) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Outgoing Action'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Outgoing Action'), ['action' => 'edit', $outgoingAction->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Outgoing Actions'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Outgoing Action'), ['action' => 'add']) ?> </li>
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
                     <th><?= __('App Key') ?></th>
                     <td style="text-align: right"><?= h($outgoingAction->app_key) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('App Secret') ?></th>
                     <td style="text-align: right"><?= h($outgoingAction->app_secret) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Status') ?></th>
                     <td style="text-align: right"><?= h($outgoingAction->status) ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($outgoingAction->id) ?></td>
                 </tr>
                                                                                     <tr>
                     <th><?= __('Created') ?></th>
                     <td style="text-align: right"><?= h($outgoingAction->created) ?></td>
                 </tr>
                                  <tr>
                     <th><?= __('Modified') ?></th>
                     <td style="text-align: right"><?= h($outgoingAction->modified) ?></td>
                 </tr>
                                                                </table>



                                       <div class="">
                 <h4><?= __('Payload') ?></h4>
                 <?= $this->Text->autoParagraph(h($outgoingAction->payload)); ?>
             </div>
                                                </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
