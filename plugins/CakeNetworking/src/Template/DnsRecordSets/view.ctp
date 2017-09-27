<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3>DNS Record / <?= h($dnsRecordSet->dns_name) ?>.<?= $dnsRecordSet->has('domain') ? $dnsRecordSet->domain->name : '' ?>.
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Dns Record Set'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Dns Record Set'), ['action' => 'edit', $dnsRecordSet->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Dns Record Sets'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Dns Record Set'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Domains'), ['controller' => 'Domains', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Domain'), ['controller' => 'Domains', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Dns Values'), ['controller' => 'DnsValues', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Dns Value'), ['controller' => 'DnsValues', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('CakeNetworking.admin_menu') ?>

    </div>
</div>


<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <table class="table table-hover">
            <tr>
                <th><?= __('Dns Name') ?></th>
                <td style="text-align: right"><?= h($dnsRecordSet->dns_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Type') ?></th>
                <td style="text-align: right"><?= h($dnsRecordSet->type) ?></td>
            </tr>
            <tr>
                <th><?= __('Domain') ?></th>
                <td style="text-align: right"><?= $dnsRecordSet->has('domain') ? $this->Html->link($dnsRecordSet->domain->name, ['controller' => 'Domains', 'action' => 'view', $dnsRecordSet->domain->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($dnsRecordSet->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Ttl') ?></th>
                <td style="text-align: right"><?= $this->Number->format($dnsRecordSet->ttl) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($dnsRecordSet->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($dnsRecordSet->modified) ?></td>
            </tr>
        </table>


        <div class="related">
            <?php if (!empty($dnsRecordSet->dns_values)): ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= __('Related Dns Values') ?>
                            <?= $this->Html->link(__('CREATE'), ['controller' => 'DnsValues', 'action' => 'add']) ?>
                        </h4>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <td><?= __('Id') ?></td>
                            <td><?= __('Name') ?></td>
                            <td><?= __('Dns Record Set Id') ?></td>
                            <td><?= __('Created') ?></td>
                            <td><?= __('Modified') ?></td>
                            <td class="actions"><?= __('Actions') ?></td>
                        </tr>
                        <?php foreach ($dnsRecordSet->dns_values as $dnsValues): ?>
                            <tr>
                                <td><?= h($dnsValues->id) ?></td>
                                <td><?= h($dnsValues->name) ?></td>
                                <td><?= h($dnsValues->dns_record_set_id) ?></td>
                                <td><?= h($dnsValues->created) ?></td>
                                <td><?= h($dnsValues->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DnsValues', 'action' => 'view', $dnsValues->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DnsValues', 'action' => 'edit', $dnsValues->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DnsValues', 'action' => 'delete', $dnsValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dnsValues->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
