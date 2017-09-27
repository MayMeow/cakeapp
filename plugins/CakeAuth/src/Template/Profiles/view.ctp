<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->

<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user-circle-o"></i></a></li>
            <li class="active"><?= h($profile->name) ?></li>
        </ol>

        <h3 class="mTop5"><strong>Profiles</strong>

        </h3>
    </div>
</div>


<!-- Begin page content -->
<main id="main-container">
    <!-- Content -->
    <div class="container" style="padding-top: 24px">
        <?php $projects = $this->cell('CakeStorage.Projects', [$profile->user_id]) ?>
        <?= $projects ?>
    </div>
    <!-- Content -->
</main>
<!-- End page Content -->
