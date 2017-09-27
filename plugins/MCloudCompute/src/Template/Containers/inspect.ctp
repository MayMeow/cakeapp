<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><?= $container->State->Running ? '<i class="fa fa-circle-o text-success"></i>' : '<i class="fa fa-circle-o text-danger"></i>' ?>
            Container <?= h($container->Name) ?> <small><?= $container->State->Status ?></small>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('List Containers'), ['action' => 'index'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Containers'), ['action' => 'index']) ?> </li>
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
        <div class="row">
            <div class="col-md-12">
                Image: <?= $container->Image ?>
            </div>
        </div>

        <div class="row" style="padding-bottom: 10px">
            <div class="col-md-12 text-right">
                <?php if($container->State->Running) : ?>
                    <?= $this->Html->link('<i class="fa fa-stop"></i> Stop', ['action' => 'stop', $container->Id ], ['class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-rotate-right"></i> Restart', ['action' => 'restart', $container->Id ], ['class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-pause"></i> Pause', ['action' => 'pause', $container->Id ], ['class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-play"></i> Unpause', ['action' => 'unpause', $container->Id ], ['class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                <?php else : ?>
                    <?= $this->Html->link('<i class="fa fa-play"></i> Start', ['action' => 'start', $container->Id ], ['class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                <?php endif; ?>
            </div>
        </div>

        <table class="table table-hover">
            <tr>
                <th><?= __('Name') ?></th>
                <td style="text-align: right"><?= h($container->Name) ?></td>
            </tr>
            <tr>
                <th><?= __('Hostname') ?></th>
                <td style="text-align: right"><?= h($container->Config->Hostname) ?></td>
            </tr>
            <tr>
                <th><?= __('Used RAM') ?></th>
                <td style="text-align: right"><?= $this->Number->toReadableSize($stats->memory_stats->usage ) ?> / <?= $this->Number->toReadableSize($stats->memory_stats->limit ) ?></td>
            </tr>
            <?php foreach ($container->NetworkSettings->Networks as $key => $network): ?>
                <tr>
                    <th><?= $key ?> <label class="label label-info">Network</label> </th>
                    <td style="text-align: right">IP: <?= $network->IPAddress ?> / GW: <?= $network->Gateway ?></td>
                </tr>
            <?php endforeach; ?>
        </table>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
