<?php $this->layout = 'CakeMetronic.default'; ?>
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!--[html-partial:include:{"file":"partials\/_header-base.html"}]/-->
    <?= $this->Element('CakeMetronic._header-base') ?>
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <?= $this->Element('CakeMetronic._aside-left', ['items' => $crud_side_nav]) ?>
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!--[html-partial:include:{"file":"partials\/_subheader-default.html"}]/-->
            <?= $this->Element('CakeMetronic._subheader-default') ?>
            <div class="m-content">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    <!--[html-partial:include:{"file":"partials\/_footer-default.html"}]/-->
    <?= $this->Element('CakeMetronic._footer-default') ?>
</div>
<!-- end:: Page -->
<!--[html-partial:include:{"file":"partials\/_layout-quick-sidebar.html"}]/-->
<?= $this->Element('CakeMetronic._layout-quick-sidebar') ?>
<!--[html-partial:include:{"file":"partials\/_layout-scroll-top.html"}]/-->
<?= $this->Element('CakeMetronic._layout-scroll-top') ?>
<!--[html-partial:include:{"file":"partials\/_layout-tooltips.html"}]/-->
<?= $this->Element('CakeMetronic._layout-tooltips') ?>
