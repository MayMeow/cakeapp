<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= __('Dns Values') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Dns Value'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Dns Values'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Dns Value'), ['action' => 'add']) ?> </li>
                                                <li><?= $this->Html->link(__('List Dns Record Sets'), ['controller' => 'DnsRecordSets', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Dns Record Set'), ['controller' => 'DnsRecordSets', 'action' => 'add']) ?> </li>
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
             <?php if(count($dnsValues) > 0) : ?>
             <div class="row">
                 <div class="col-md-12">

                     <div class="table-responsive">
                    <table class="table table-hover table-vcenter">
                        <thead>
                        <tr>
                                                        <td><?= $this->Paginator->sort('id') ?></td>
                                                        <td><?= $this->Paginator->sort('name') ?></td>
                                                        <td><?= $this->Paginator->sort('dns_record_set_id') ?></td>
                                                        <td><?= $this->Paginator->sort('created') ?></td>
                                                        <td><?= $this->Paginator->sort('modified') ?></td>
                                                        <td class="actions text-center"><?= __('Actions') ?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dnsValues as $dnsValue): ?>
                        <tr>
                                                        <td><?= $this->Number->format($dnsValue->id) ?></td>
                                                        <td><?= h($dnsValue->name) ?></td>
                                                        <td>
                                <?= $dnsValue->has('dns_record_set') ? $this->Html->link($dnsValue->dns_record_set->id, ['controller' => 'DnsRecordSets', 'action' => 'view', $dnsValue->dns_record_set->id]) : '' ?>
                            </td>
                                                        <td><?= h($dnsValue->created) ?></td>
                                                        <td><?= h($dnsValue->modified) ?></td>
                                                        <td class="actions text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $dnsValue->id], ['class' => 'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dnsValue->id], ['class' => 'btn btn-xs btn-default']) ?>
                                        <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete-<?= $dnsValue->id?>">Delete</button>

                                </div>
                                <?= $this->element('CakeBootstrap.deletemodal', ['id' => $dnsValue->id, 'name' => $dnsValue->id]); ?>
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
                                        <p><strong>You currently have now Dns Values</strong></p>
                                        <p>To get started, click to button bellow and create new Dns Value</p>
                                        <?= $this->Html->link(__('Add new Dns Value'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

         </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
