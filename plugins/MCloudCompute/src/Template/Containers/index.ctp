<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-microchip"></i> Cloud Compute / <?= __('Containers') ?>
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
        <?php if (count($containers->data) > 0) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>State</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($containers->data as $container): ?>
                                <tr>
                                    <td>
                                        <strong><?= $container->State == 'running' ? '<i class="fa fa-circle-o text-success"></i>' : '<i class="fa fa-circle-o text-danger"></i>' ?></strong>
                                        <?= $container->Names[0] ?>
                                    </td>
                                    <td>
                                        <?= $container->State ?>
                                    </td>
                                    <td><?= $this->Html->link('Inspect', ['action' => 'inspect', $container->Id]) ?> </td>
                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>
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
