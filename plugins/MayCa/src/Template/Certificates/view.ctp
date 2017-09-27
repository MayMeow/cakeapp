<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><?= h($certificate->internal_name) ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Certificate'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Certificate'), ['action' => 'edit', $certificate->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Certificate'), ['action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>
        <?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
    </div>
</div>


<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <table class="table table-hover">
            <tr>
                <th><?= __('Internal Name') ?></th>
                <td style="text-align: right"><?= h($certificate->internal_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Common Name') ?></th>
                <td style="text-align: right"><?= h($certificate->common_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td style="text-align: right"><?= h($certificate->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Country') ?></th>
                <td style="text-align: right"><?= h($certificate->country) ?></td>
            </tr>
            <tr>
                <th><?= __('Province') ?></th>
                <td style="text-align: right"><?= h($certificate->province) ?></td>
            </tr>
            <tr>
                <th><?= __('Locality') ?></th>
                <td style="text-align: right"><?= h($certificate->locality) ?></td>
            </tr>
            <tr>
                <th><?= __('Organization') ?></th>
                <td style="text-align: right"><?= h($certificate->organization) ?></td>
            </tr>
            <tr>
                <th><?= __('Organization Unit') ?></th>
                <td style="text-align: right"><?= h($certificate->organization_unit) ?></td>
            </tr>
            <tr>
                <th><?= __('Uid') ?></th>
                <td style="text-align: right"><label class="label label-info"><?= h($certificate->uid) ?></label></td>
            </tr>
            <tr>
                <th><?= __('Type') ?></th>
                <td style="text-align: right"><?= h($certificate->type) ?></td>
            </tr>
            <tr>
                <th><?= __('Parent CA') ?></th>
                <td style="text-align: right"><?= $certificate->parent_certificate ? h($certificate->parent_certificate->internal_name) : 'Its Root CA' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td style="text-align: right"><?= $this->Number->format($certificate->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td style="text-align: right"><?= h($certificate->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td style="text-align: right"><?= h($certificate->modified) ?></td>
            </tr>
            <tr>
                <th><?= __('Ca') ?></th>
                <td style="text-align: right"><?= $certificate->ca ? __('Yes') : __('No'); ?></td>
            </tr>
            <tr>
                <th><?= __('Signed') ?></th>
                <td style="text-align: right"><?= $certificate->signed ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>


        <div class="row">
            <div class="col-md-12">
                <?php if (!$certificate->signed) : ?>
                    <?= $this->Html->link('Sign', ['action' => 'sign', $certificate->id], ['class' => 'btn btn-success']); ?>
                <?php else: ?>
                    <h4 class="page-header">Your certificate files</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-file-o"></i> certificate.crt
                                <?= $this->Html->link('Download' , ['action' => 'downloadCertificate', $certificate->id, 'certificate.crt'])?>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <pre><?= $signedCertificate['certificate'] ?></pre>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-file-o"></i> key.pem</h4>
                        </div>
                        <div class="panel-body">
                            <pre><?= $signedCertificate['key'] ?></pre>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-file-o"></i> code.txt</h4>
                        </div>
                        <div class="panel-body">
                            <pre><?= $signedCertificate['code'] ?></pre>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
