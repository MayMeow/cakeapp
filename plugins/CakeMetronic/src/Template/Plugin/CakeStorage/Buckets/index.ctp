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



<?php if (count($buckets) > 0) : ?>

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <div class="m-portlet__head-text">
                        Repository index
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <div class="m-section">
                <div class="m-section__content">
                    <table class="table m-table table-hover hs_table-striped">
                        <thead>
                        <tr>
                            <!--<td><?/*= $this->Paginator->sort('id') */?></td>-->
                            <td><?= $this->Paginator->sort('name') ?></td>
                            <td><?= $this->Paginator->sort('uid') ?></td>
                            <td><?= $this->Paginator->sort('created') ?></td>
                            <!--<td><?/*= $this->Paginator->sort('modified') */?></td>-->
                            <td class="actions text-center"><?= __('Actions') ?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($buckets as $bucket): ?>
                            <tr>
                                <!--<td><?/*= $this->Number->format($bucket->id) */?></td>-->
                                <td>
                                    <strong><i class="fab fa-bitbucket"></i></strong>
                                    <?= h($bucket->name) ?>
                                </td>
                                <td><?= h($bucket->uid) ?></td>
                                <td><?= h($bucket->created) ?></td>
                                <!--<td><?/*= h($bucket->modified) */?></td>-->
                                <td class="actions text-center">
                                    <?= $this->element('CakeMetronic.Table/_actions', ['id' => $bucket->id])?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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


    <div class="m-portlet m-portlet--skin-dark m-portlet--bordered-semi m--bg-brand">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-add"></i>
                </span>
                    <h3 class="m-portlet__head-text">
                        You dont have any Buckets now
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body text-center">
            <p>You can create one by clicking button bellow</p>
            <?= $this->Html->link(__('Add new Bucket'), ['action' => 'add'], ['class' => 'btn m-btn--pill m-btn--air btn-outline-accent m-btn m-btn--outline-2x']); ?>
        </div>
    </div>




<?php endif; ?>

<!-- End page Content -->