<?php $this->layout = 'CakeBootstrap.default-with-sidebar'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <?= $this->fetch('breadcrumb') ?>

        <h3 class="mTop5"><strong><?= $this->fetch('page-title') ?></strong>
            <div class="pull-right">
                <?= $this->fetch('header-buttons') ?>
            </div>
        </h3>
        <?= $this->fetch('page-menu') ?>
    </div>
</div>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3"><?= $this->fetch('sidebar-content') ?></div>
            <div class="col-md-9"><?= $this->fetch('content') ?></div>
        </div>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
