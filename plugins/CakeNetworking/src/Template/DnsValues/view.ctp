<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= h($dnsValue->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Dns Value'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Dns Value'), ['action' => 'edit', $dnsValue->id]) ?> </li>
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

             <table class="table table-hover">
                                                                    <tr>
                     <th><?= __('Name') ?></th>
                     <td style="text-align: right"><?= h($dnsValue->name) ?></td>
                 </tr>
                                                                    <tr>
                     <th><?= __('Dns Record Set') ?></th>
                     <td style="text-align: right"><?= $dnsValue->has('dns_record_set') ? $this->Html->link($dnsValue->dns_record_set->id, ['controller' => 'DnsRecordSets', 'action' => 'view', $dnsValue->dns_record_set->id]) : '' ?></td>
                 </tr>
                                                                                                                       <tr>
                     <th><?= __('Id') ?></th>
                     <td style="text-align: right"><?= $this->Number->format($dnsValue->id) ?></td>
                 </tr>
                                                                                     <tr>
                     <th><?= __('Created') ?></th>
                     <td style="text-align: right"><?= h($dnsValue->created) ?></td>
                 </tr>
                                  <tr>
                     <th><?= __('Modified') ?></th>
                     <td style="text-align: right"><?= h($dnsValue->modified) ?></td>
                 </tr>
                                                                </table>



                                   </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
