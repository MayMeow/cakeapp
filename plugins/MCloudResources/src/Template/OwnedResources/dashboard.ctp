<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->

<!-- Begin page content -->
<main id="main-container" style="padding-top: 20px">

    <!-- Content -->
    <div class="container">
        <?php if ($ownedResources) : ?>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <i class="fa fa-signal"></i> <strong class="text-info">Notification</strong><br />
                            Scheduled maintenance start 3.5.2017 at 1:00 pm CET
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cubes"></i> Your resources</h3>
                        </div>
                        <table class="table">
                            <tbody>
                            <?php foreach ($ownedResources as $ownedResource): ?>
                                <tr>
                                    <td>
                                        <strong><i class="fa fa-<?= h($ownedResource->resource_class->icon) ?>"></i></strong>
                                        <?= $this->Html->link(h($ownedResource->resource_class->package) . '/<strong>' . h($ownedResource->name) . '</strong>',
                                            [
                                                'plugin' => $ownedResource->resource_class->package,
                                                'controller' => $ownedResource->resource_class->ctrl,
                                                'action' => 'view', $ownedResource->instance_key
                                            ],
                                            ['escape' => false])
                                        ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="panel-footer text-center">
                            <a href="<?= $this->Url->build(['action' => 'index']) ?>">Show all resources ...</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <h2><i class="fa fa-plus-square-o text-amethyst"></i></h2>
                            <p><strong>You currently have now Owned Resources</strong></p>
                            <p>To get started, click to button bellow and create new Owned Resource</p>
                            <?= $this->Html->link(__('Add new Owned Resource'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
