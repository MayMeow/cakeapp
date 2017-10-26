<?php $this->extend('CakeMetronic./Common/_layout'); ?>

<?php $this->assign('page-title', 'Projects'); ?>

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
    <span class="m-nav__link-text">Resources</span>
</a>
</li>
<li class="m-nav__separator">-</li>
<li class="m-nav__item">
<a href="" class="m-nav__link">
    <span class="m-nav__link-text">Projects</span>
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



<?php if (count($resourceGroups) > 0) : ?>

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <div class="m-portlet__head-text">
                        Projects index
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <div class="m-section">
                <div class="m-section__content">
                <table class="table m-table table-hover hs_table-striped">
                    <thead class="thead-default">
                        <tr>
                            <th><?= $this->Paginator->sort('name') ?></th>
                            <th><?= $this->Paginator->sort('user_id') ?></th>
                            <th class="actions text-center"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($resourceGroups as $resourceGroup): ?>
                            <tr>
                                <td><label class="label label-info"><?= $this->Number->format($resourceGroup->id) ?></label> <?= h($resourceGroup->name) ?></td>
                                <td>
                                    <?= $resourceGroup->has('user') ? $this->Html->link($resourceGroup->user->username, ['controller' => 'Users', 'action' => 'view', $resourceGroup->user->id]) : '' ?>
                                </td>
                                <td class="actions text-center">
                                    <?= $this->element('CakeMetronic.Table/Projects/_actions', ['id' => $resourceGroup->id, 'slug' => $resourceGroup->slug])?>
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
                    You dont have any Projects now
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body text-center">
        <p>You can create one by clicking button bellow</p>
        <?= $this->Html->link(__('Add new Project'), ['action' => 'add'], ['class' => 'btn m-btn--pill m-btn--air btn-outline-accent m-btn m-btn--outline-2x']); ?>
    </div>
</div>




<?php endif; ?>

<!-- End page Content -->