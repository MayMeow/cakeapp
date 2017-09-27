<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= h($comment->id) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Comment'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
                                                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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
                     <th><?= __('User') ?></th>
                     <td style="text-align: right"><?= $comment->has('user') ? $this->Html->link($comment->user->id, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($comment->id) ?></td>
                 </tr>
                                                                                     <tr>
                     <th><?= __('Created') ?></th>
                     <td style="text-align: right"><?= h($comment->created) ?></td>
                 </tr>
                                  <tr>
                     <th><?= __('Modified') ?></th>
                     <td style="text-align: right"><?= h($comment->modified) ?></td>
                 </tr>
                                                                </table>



                                       <div class="">
                 <h4><?= __('Message') ?></h4>
                 <?= $this->Text->autoParagraph(h($comment->message)); ?>
             </div>
                                                </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
