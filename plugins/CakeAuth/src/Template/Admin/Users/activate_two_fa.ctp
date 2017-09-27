<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-shield"></i> IAM & Admin / <?= __('Users') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('CakeAuth.admin_menu') ?>

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
                        echo $this->Form->input('two_fa_secret', ['value' => $secret, 'type' => 'hidden']);
                    ?>

                    <div class="row">
                        <div class="col-md-3 text-right"><strong>Readable format:</strong></div>
                        <div class="col-md-9"><strong><?= $secretReadable ?></strong>
                            <p>Write this int your authenticator application without dashes</p>
                        </div>
                    </div>

                    <?php
                    echo $this->Form->input('pin', ['placeholder' => 'Enter your PIN']);
                    ?>
                </div>



                <div class="form-action">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <?= $this->Form->button(__('Activate 2FA'), ['class' => 'btn green']) ?>
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
