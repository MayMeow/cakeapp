<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3>Resource classes / <?= h($resourceClass->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Resource Class'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Resource Class'), ['action' => 'edit', $resourceClass->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Resource Classes'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Resource Class'), ['action' => 'add']) ?> </li>
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
                     <td style="text-align: right"><?= h($resourceClass->name) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Ctrl') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->ctrl) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Package') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->package) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Uid') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->uid) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Uname') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->uname) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Icon') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->icon) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Developer') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->developer) ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($resourceClass->id) ?></td>
                 </tr>
                                                                                     <tr>
                     <th><?= __('Created') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->created) ?></td>
                 </tr>
                                  <tr>
                     <th><?= __('Modified') ?></th>
                     <td style="text-align: right"><?= h($resourceClass->modified) ?></td>
                 </tr>
                                                                </table>



                                       <div class="">
                 <h4><?= __('Description') ?></h4>
                 <?= $this->Text->autoParagraph(h($resourceClass->description)); ?>
             </div>
                                                </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
