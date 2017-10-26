<?php $this->layout = 'CakeBootstrap.default-with-sidebar'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema with-nav-tabs bg-white" style="height: 40px">
    <div class="container container-boxed border-bottom-gray pBot5">
        <div class="pull-right" style="margin: 5px 0 0 0">
            <?= $this->fetch('header-buttons') ?>
        </div>
        <?= $this->fetch('breadcrumb') ?>

        <?php /*$this->fetch('page-menu')*/ ?>
    </div>
</div>

<?= $this->fetch('projects-description') ?>

<?= $this->fetch('projects-navigation') ?>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container-boxed">
        <?= $this->fetch('content') ?>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
