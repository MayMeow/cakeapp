<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-globe"></i> Networking / <?= __('Dns Record Sets') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Dns Record Set'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
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
        <?php if (count($dnsRecordSets) > 0) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td><?= $this->Paginator->sort('id') ?></td>
                                <td><?= $this->Paginator->sort('dns_name') ?></td>
                                <td><?= $this->Paginator->sort('type') ?></td>
                                <td><?= $this->Paginator->sort('ttl') ?></td>
                                <td>Data</td>
                                <td class="actions text-center"><?= __('Actions') ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dnsRecordSets as $dnsRecordSet): ?>
                                <tr>
                                    <td><?= $this->Number->format($dnsRecordSet->id) ?></td>
                                    <td><?= $dnsRecordSet->dns_name == '@' ? '' : h($dnsRecordSet->dns_name) . '.' ?><?= $dnsRecordSet->has('domain') ? $this->Html->link($dnsRecordSet->domain->name, ['controller' => 'Domains', 'action' => 'view', $dnsRecordSet->domain->id]) . '.' : '' ?></td>
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
                            <p><strong>You currently have now Dns Record Sets</strong></p>
                            <p>To get started, click to button bellow and create new Dns Record Set</p>
                            <?= $this->Html->link(__('Add new Dns Record Set'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
