<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3>Domains / <?= h($domain->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Domain'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Domain'), ['action' => 'edit', $domain->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Domains'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Domain'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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
                <th><?= __('Name') ?></th>
                <td style="text-align: right"><?= h($domain->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Domain Key') ?></th>
                <td style="text-align: right"><?= h($domain->domain_key) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td style="text-align: right"><?= $domain->has('user') ? $this->Html->link($domain->user->id, ['controller' => 'Users', 'action' => 'view', $domain->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($domain->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($domain->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($domain->modified) ?></td>
            </tr>
        </table>

        <div class="related">
            <?php if (!empty($domain->dns_record_sets)): ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= __('Record sets') ?>
                        </h4>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <td><?= __('DNS name') ?></td>
                            <td><?= __('Type') ?></td>
                            <td><?= __('TTL') ?></td>
                            <td class="actions"><?= __('Actions') ?></td>
                        </tr>

                        <?php foreach ($domain->dns_record_sets as $dnsRecordSet): ?>
                            <tr>
                                <td><?= $dnsRecordSet->dns_name == '@' ? '' : h($dnsRecordSet->dns_name) . '.' ?><span style="font-weight: 600"><?= $domain->name . '.' ?></span> </td>
                                <td><?= h($dnsRecordSet->type) ?></td>
                                <td><?= $this->Number->format($dnsRecordSet->ttl) ?></td>
                                <td>

                                    <?php foreach ($dnsRecordSet->dns_values as $dns_value): ?>
                                        <?= $dns_value->name ?><br />
                                    <?php endforeach; ?>

                                </td>
                                <td class="actions text-center">
                                    <div class="btn-group">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $dnsRecordSet->id], ['class' => 'btn btn-xs btn-default']) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dnsRecordSet->id], ['class' => 'btn btn-xs btn-default']) ?>
                                        <button class="btn btn-xs btn-danger" type="button" data-toggle="modal"
                                                data-target="#modal-delete-<?= $dnsRecordSet->id ?>">Delete
                                        </button>

                                    </div>
                                    <?= $this->element('CakeBootstrap.deletemodal', ['id' => $dnsRecordSet->id, 'name' => $dnsRecordSet->id]); ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </table>
                </div>
            <?php endif; ?>
        </div>

        <?= $this->cell('Docs', ['Networking/domains']) ?>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
