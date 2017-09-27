<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<?php $this->start('scripts_for_page'); ?>
<?= $this->Html->script('clipboard.min') ?>
<script>
    var clipboard = new Clipboard('.copy');
    clipboard.on('success', function (e) {
        console.log(e);
    });

    clipboard.on('error', function (e) {
        console.log(e);
    });
</script>
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3>Disks / <?= h($disk->name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Disk'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Disk'), ['action' => 'edit', $disk->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Disks'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Disk'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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
                <?= $this->Html->link(__('<i class="fa fa-cloud-upload"></i> Add new file'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) ?>
            </div>
        </div>

        <table class="table table-hover">
            <tr>
                <th><?= __('Name') ?></th>
                <td style="text-align: right"><?= h($disk->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Description') ?></th>
                <td style="text-align: right"><?= h($disk->description) ?></td>
            </tr>
            <tr>
                <th><?= __('Uid') ?></th>
                <td style="text-align: right"><?= h($disk->uid) ?></td>
            </tr>
            <tr>
                <th><?= __('State') ?></th>
                <td style="text-align: right"><?= $disk->state == "IN_SERVICE" ? '<label class="label label-success"><i class="fa fa-check"></i> In Service</label>' : '<label class="label label-danger">Offline</label>' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td style="text-align: right"><?= $disk->has('user') ? $this->Html->link($disk->user->id, ['controller' => 'Users', 'action' => 'view', $disk->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($disk->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Size') ?></th>
                <td style="text-align: right"><?= $this->Number->toReadableSize($disk->size * 1024 * 1024 * 1024) ?></td>
            </tr>
            <tr>
                <th><?= __('Usage') ?></th>
                <td style="text-align: right">
                    <?= $this->Number->toReadableSize($dirsize) ?>
                <small>
                    <?= $this->Number->toPercentage(($dirsize / ($disk->size * 1024 * 1024 * 1024)) *100) ?>
                </small>
                </td>
            </tr>
            <tr>
                <th><?= __('Estimated price') ?></th>
                <td style="text-align: right"><?= $this->Number->currency($price, 'EUR')?> <small>/mo</small></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($disk->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($disk->modified) ?></td>
            </tr>
            <tr>
                <th><?= __('Create disk') ?> <label class="label label-info">PowerShell</label></th>
                <td style="text-align: right">
                    New-VHD -Path K:\<?= h($disk->name)?>.vhdx -SizeBytes <?= h($disk->size) ?>GB
                    <small class="copy text-info" data-clipboard-action="copy" data-clipboard-target="#copy-rsync">Copy</small>
                </td>
            </tr>
            <tr>
                <th><?= __('Setup') ?> <label class="label label-info">SSH</label></th>
                <td style="text-align: right">
                    sudo mkfs.ext4 -F /dev/disk/by-id/your-disk-id <br />
                    sudo mount -o discard,defaults /dev/disk/by-id/your-disk-id /cloud/disks/<?= h($disk->uid) ?>
                </td>
            </tr>
            <tr>
                <th><?= __('Update fstab') ?> <label class="label label-info">SSH</label></th>
                <td style="text-align: right">
                    echo /dev/disk/by-id/your-disk-id /cloud/disk/<?= h($disk->uid) ?> ext4 defaults,nofail,discard 0 0 | sudo tee -a /etc/fstab
                </td>
            </tr>
        </table>

        <div class="related">

            <?php if (!empty($files) || !empty($dirs)): ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= __('Content') ?>
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
                                    <td><i class="fa fa-folder-o"></i> <a
                                            href="<?= $this->Url->build($this->request->here() . DS . $dir) ?>"><?= $dir ?></a>
                                    </td>
                                    <td>DIR</td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php foreach ($files as $file): ?>
                            <tr>
                                <td><i class="fa fa-file-o"></i> <?= h($file['basename']) ?></td>
                                <td><?= h($file['mime']) ?></td>
                                <td><?= $this->Number->toReadableSize($file['filesize']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <?= $this->cell('Docs', ['Storage/disks']) ?>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
