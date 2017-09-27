<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray bg-amethyst-sl">
    <div class="container">
        <h3><?= __('New password') ?>
            <div class="pull-right">

            </div>
        </h3>

    </div>
</div>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Form</h4>
            </div>
            <div class="panel-body">
                <?php if ($allowPasswordChange): ?>
                    <?= $this->Form->create($user, ['align' => [
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
                        echo $this->Form->input('password');
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
                    <?php else : ?>
                    <h3>This resetID not exist or it's expired.</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
