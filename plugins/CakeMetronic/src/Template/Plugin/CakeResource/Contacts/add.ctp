<?php $this->extend('CakeMetronic./Common/_layout'); ?>

<?php $this->assign('page-title', 'Code Repositories'); ?>


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
    <span class="m-nav__link-text">Code Repositories</span>
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
                        Add Contact
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <div class="m-section">
                <div class="m-section__content">
                <?= $this->Form->create($contact, []) ?>

        <div class="form-body">
            <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('description');
                        echo $this->Form->input('email');
                        echo $this->Form->input('website');
                        echo $this->Form->input('phone');
                        echo $this->Form->input('mobile');
                        echo $this->Form->input('address');
                        echo $this->Form->input('zip');
                        echo $this->Form->input('country');
                        echo $this->Form->input('state');
                        echo $this->Form->input('company_id', ['options' => $companies, 'empty' => true]);
                        ?>
        </div>
        <div class="form-action">
            <div class="row">
                <div class="col-md-offset-3 col-md-4">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn m-btn m-btn--gradient-from-success m-btn--gradient-to-accent']) ?>
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