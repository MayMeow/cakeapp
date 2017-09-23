<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <div class="col-md-3" style="padding-top: 40px">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Settings</h3>
                </div>
                <div class="list-group">
                    <?= $this->element('mcloud_setting_menu') ?>
                </div>
            </div>

        </div>

        <div class="col-md-9">

            <h1 class="page-header sub-header"">License</h1>

            <?= $this->cell('CakeApp.SystemUtility::license') ?>

            <?= $this->cell('Docs::text', ['LICENSE']) ?>

        </div>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->