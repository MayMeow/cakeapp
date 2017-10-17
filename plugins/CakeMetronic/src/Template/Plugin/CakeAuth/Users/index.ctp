<?php $this->extend('CakeMetronic./Common/_layout'); ?>

<?php $this->assign('page-title', 'Users'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

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
    <span class="m-nav__link-text">Base</span>
</a>
</li>
<li class="m-nav__separator">-</li>
<li class="m-nav__item">
<a href="" class="m-nav__link">
    <span class="m-nav__link-text">Navs</span>
</a>
</li>
<?php $this->end() ?>

<!-- Begin page content -->

<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        Here you can manage users on your server
    </div>
</div>



<?php if (count($users) > 0) : ?>

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <div class="m-portlet__head-text">
                        Users index
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
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>

                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('verified') ?></th>
                    <th>2FA</th>
                    <th><?= $this->Paginator->sort('created') ?></th>

                    <th class="actions text-center"><?= __('Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td>
                            <strong><i class="fa fa-user-circle"></i></strong>
                            <?= h($user->username) ?>
                        </td>

                        <td><label class="label label-info"><?= h($user->role) ?></label></td>
                        <td><?= h($user->verified) ?></td>
                        <td><?= $user->two_fa_secret ? '<i class="fa fa-lock text-success"></i>' : '<i class="fa fa-times"></i>' ?></td>
                        <td><?= h($user->created) ?></td>

                        <td class="actions text-center">
                        <?= $this->element('CakeMetronic.Table/_actions', ['id' => $user->id])?>
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
                    You dont have any Users now
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body text-center">
        <p>You can create one by clicking button bellow</p>
        <?= $this->Html->link(__('Add new User'), ['action' => 'add'], ['class' => 'btn m-btn--pill m-btn--air btn-outline-accent m-btn m-btn--outline-2x']); ?>
    </div>
</div>




<?php endif; ?>

<!-- End page Content -->