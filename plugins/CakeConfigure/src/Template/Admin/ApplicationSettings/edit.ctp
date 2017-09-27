<?php $this->extend('CakeApp./Common/form');?>

<?php $this->assign('page-title', 'Application Settings'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Application Setting'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List Application Settings'), ['action' => 'index']) ?> </li>
            </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<?php $this->end() ?>

<!-- Begin page content -->

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Form</h4>
    </div>
    <div class="panel-body">
        <?= $this->Form->create($applicationSetting, ['align' => [
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
                        echo $this->Form->input('config_key');
                        echo $this->Form->input('config_value');
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
    </div>
</div>

<!-- End page Content -->
