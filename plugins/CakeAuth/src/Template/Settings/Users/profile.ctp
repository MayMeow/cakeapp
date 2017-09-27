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

            <h1 class="page-header sub-header">Profile</h1>

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
                Here you can edit your profile information.
                <h4 class="page-header">Account</h4>
                <?php
                echo $this->Form->input('username', ['disabled']);
                echo $this->Form->input('role', ['disabled']);
                ?>
                <h4 class="page-header">Public profile</h4>
                <?php
                //profile
                echo $this->Form->input('profile.name');
                echo $this->Form->input('profile.bio');
                echo $this->Form->input('profile.company');
                echo $this->Form->input('profile.url');
                echo $this->Form->input('profile.location');
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

            <div style="margin-bottom: 20px">
                <h4 class="page-header">Image</h4>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-3">Here you can change your image</div>
                    <div class="col-md-9">
                        <?= $user->image ? $this->Html->image($user->image, ['height' => '180', 'width' => '180', 'class' => 'img img-circle']) : '' ?>
                    </div>
                </div>
                <?= $this->Form->create($user, [
                    'type' => 'file',
                    'url' => ['action' => 'updateImage', 'prefix' => 'settings'],
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
                    ]
                ]) ?>

                <div class="form-body">
                    <?php
                    echo $this->Form->input('image_file', ['type' => 'file']);
                    ?>
                </div>
                <div class="form-action">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <?= $this->Form->button(__('Update account'), ['class' => 'btn green']) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>

            </div>

        </div>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
