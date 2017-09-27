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
            <h1 class="page-header sub-header">2FA Authentication</h1>
            2 Factor authentication works with most of authenticator applications. This feature is currently in development.
            <h4 class="page-header">2FA Authentication <label class="label label-danger">Beta</label></h4>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-3"><strong>Current Status</strong></div>
                <div class="col-md-9">
                    <?= $user->two_fa_secret ? 'Turned ON' : 'Turned off' ?>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-3">For increase security you can activate 2FA authentication. It works with most authenticators for example GoogleAuthenticator</div>
                <div class="col-md-9">
                    <?php
                    if($user->two_fa_secret != null) {
                        echo $this->Form->postlink('Deactivate 2FA', ['prefix' => 'admin', 'action' => 'deactivateTwoFa', $user->id], ['class' => 'btn btn-warning']);
                    } else {
                        echo $this->Html->link('Activate 2FA', ['prefix' => 'admin', 'action' => 'activateTwoFa', $user->id], ['class' => 'btn btn-success']);
                    }
                    ?>
                </div>
            </div>

        </div>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
