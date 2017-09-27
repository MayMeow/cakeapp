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
            <h1 class="page-header sub-header">Change Password</h1>

            <?= $this->Form->create($user, [
                'url' => ['action' => 'edit', $user->id],
                'align' => [
                'sm' => [
                    'left' => 6,
                    'middle' => 6,
                    'right' => 12
                ],
                'md' => [
                    'left' => 3,
                    'middle' => 9
                ]
            ]]) ?>

            <div class="form-body">
                <?php
                echo $this->Form->input('username', ['disabled']);
                echo $this->Form->input('role', ['disabled']);
                echo $this->Form->input('password');
                //echo $this->Form->input('verified');
                //echo $this->Form->input('uid');
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

            <h4 class="page-header text-danger">Deactivate profile <label class="label label-info">Not implemented</label></h4>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-3">Profile can be activated back if you change your mind</div>
                <div class="col-md-9">
                    <a href="#" class="btn btn-danger">Deactivate profile</a>
                </div>
            </div>

        </div>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
