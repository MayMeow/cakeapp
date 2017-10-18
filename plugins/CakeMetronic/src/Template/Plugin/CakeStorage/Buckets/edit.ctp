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
<div class="row"><div class="col-md-6">
<div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <div class="m-portlet__head-text">
                        Edit
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <div class="m-section">
                <div class="m-section__content">
                    <?= $this->Form->create($bucket, []) ?>

                    <div class="form-body">
                        <?php
                        echo $this->Form->input('name');
                        //echo $this->Form->input('uid');
                        //echo $this->Form->input('project_id', ['options' => $groups]);
                        ?>
                    </div>
                    <div class="form-action">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-4">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn green']) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>

        </div>
</div>
</div></div>

<!-- End page Content -->