<?php $this->extend('CakeMetronic./Common/_layout'); ?>

<?php $this->assign('page-title', 'Buckets'); ?>

<?php $this->start('header-dropdown-content'); ?>
<li class="m-nav__item">
    <a href="" class="m-nav__link">
        <i class="m-nav__link-icon flaticon-share"></i>
        <span class="m-nav__link-text">Activity</span>
    </a>
</li>
<?php $this->end() ?>

<?php $this->start('aditional-header-buttons'); ?>

<a href="#" class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--pill m-btn--air">
    <i class="la la-plus m--hide"></i>
    <i class="la la-cloud-upload"></i>
</a>

<?php $this->end(); ?>

<?php $this->start('page-scripts'); ?>
<?= $this->Html->script('CakeMetronic./demo/default/custom/components/portlets/tools'); ?>
<?php $this->end(); ?>

<?php $this->start('breadcrumb'); ?>
<li class="m-nav__item m-nav__item--home">
    <a href="#" class="m-nav__link m-nav__link--icon">
        <i class="m-nav__link-icon la la-home"></i>
    </a>
</li>
<li class="m-nav__separator">-</li>
<li class="m-nav__item">
    <a href="" class="m-nav__link">
        <span class="m-nav__link-text">Storage</span>
    </a>
</li>
<li class="m-nav__separator">-</li>
<li class="m-nav__item">
    <a href="" class="m-nav__link">
        <span class="m-nav__link-text">Buckets</span>
    </a>
</li>
<?php $this->end() ?>

<!-- Begin page content -->

<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        Code repositories can be used to store and tracking your source code. In order to use it you mush have installed GIT client in your computer.
    </div>
</div>





    <div class="m-portlet m-portlet--mobile m-portlet--collapse" id="m_portlet_tools_2">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-exclamation-1"></i>
                    </span>
                    <div class="m-portlet__head-text">
                        Bucket informations
                    </div>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse" style="">
                            <i class="la la-plus"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body" style="display: none">

            <div class="m-section">
                <div class="m-section__content">
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
                </div>
            </div>

        </div>
    </div>
<?php if (!empty($files) || !empty($dirs)): ?>
<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-placeholder-2"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Files <?= $this->Number->toReadableSize($dirsize) ?>
                </h3>
            </div>
        </div>

    </div>
    <div class="m-portlet__body">
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
</div>
<?php endif; ?>





<!-- End page Content -->