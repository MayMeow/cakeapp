<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('admin_menu'); ?>
<?= $this->element('CakeStorage.admin_menu') ?>
<?php $this->end() ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<?php $this->start('scripts_for_page'); ?>
<?= $this->Html->script('clipboard.min') ?>
<script>
var clipboard = new Clipboard('.copy');
clipboard.on('success', function(e) {
    console.log(e);
});

clipboard.on('error', function(e) {
    console.log(e);
});
</script>

<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-bitbucket"></i> Buckets / <?= h($bucket->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Bucket'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Bucket'), ['action' => 'edit', $bucket->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Buckets'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Bucket'), ['action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('CakeStorage.admin_menu') ?>

    </div>
</div>


<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <div class="row" style="padding-bottom: 10px">
            <div class="col-md-12 text-right">
                <?= $this->Html->link(__('<i class="fa fa-plus"></i> Create new file'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) ?>
                <?= $this->Html->link(__('<i class="fa fa-cloud-upload"></i> Add new file'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <table class="table table-hover">
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td style="text-align: right"><?= h($bucket->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Uid') ?></th>
                        <td style="text-align: right"><?= h($bucket->uid) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td style="text-align: right"><?= $this->Number->format($bucket->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td style="text-align: right"><?= h($bucket->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td style="text-align: right"><?= h($bucket->modified) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Size') ?></th>
                        <td style="text-align: right"><?= $this->Number->toReadableSize($dirsize) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Estimated price') ?></th>
                        <td style="text-align: right"><?= $dirprice == true ? $this->Number->currency($dirprice, 'EUR') : '<label class="label label-success">Free</label>' ?> <small>/mo</small></td>
                    </tr>
                </table>


                <div class="related">

                    <?php if (!empty($files) || !empty($dirs)): ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title"><?= __('Content') ?> <strong style="font-size: 14px"><?= $this->Number->toReadableSize($dirsize) ?></strong>
                                </h4>
                            </div>
                            <table class="table table-hover">
                                <tr>

                                    <td><?= __('Name') ?></td>
                                    <td><?= __('type') ?></td>
                                    <td><?= __('size') ?></td>

                                </tr>
                                <?php if (!empty($dirs)): ?>
                                    <?php foreach ($dirs as $dir): ?>
                                        <tr>
                                            <td>
                                                <i class="fa fa-folder-o"></i>
                                                <strong><a href="<?= $this->Url->build($this->request->here() . DS . $dir) ?>"><?= $dir ?></a>/</strong>
                                            </td>
                                            <td>DIR</td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php foreach ($files as $file): ?>
                                    <tr>
                                        <td>
                                            <i class="fa fa-file-o"></i>
                                            <a href="<?= $this->Url->build(['action' => 'blob', $bucket->id, $folderPath . '/' . $file['basename']]) ?>"><?= $file['basename'] ?></a>
                                        </td>
                                        <td><?= h($file['mime']) ?></td>
                                        <td><?= $this->Number->toReadableSize($file['filesize']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>




                </div>

            </div>
        </div>

        <?= $this->cell('Docs', ['Storage/buckets']) ?>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
