<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= h($label->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Label'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Label'), ['action' => 'edit', $label->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Labels'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Label'), ['action' => 'add']) ?> </li>
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
                     <th><?= __('Name') ?></th>
                     <td style="text-align: right"><?= h($label->name) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Label Class') ?></th>
                     <td style="text-align: right"><?= h($label->label_class) ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($label->id) ?></td>
                 </tr>
                                                                                 </table>



                                   </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
