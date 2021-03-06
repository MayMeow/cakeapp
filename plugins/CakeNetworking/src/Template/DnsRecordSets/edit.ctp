<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end(); ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">
        <h3><i class="fa fa-globe"></i> Networking / <?= __('Dns Record Sets') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Dns Record Set'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Dns Record Sets'), ['action' => 'index']) ?> </li>
                                                <li><?= $this->Html->link(__('List Domains'), ['controller' => 'Domains', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Domain'), ['controller' => 'Domains', 'action' => 'add']) ?> </li>
                                                <li><?= $this->Html->link(__('List Dns Values'), ['controller' => 'DnsValues', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Dns Value'), ['controller' => 'DnsValues', 'action' => 'add']) ?> </li>
                                            </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('CakeNetworking.admin_menu') ?>

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
                     <?= $this->Form->create($dnsRecordSet, ['align' => [
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
                                                  echo $this->Form->input('dns_name');
                                                  echo $this->Form->input('type');
                                                  echo $this->Form->input('ttl');
                                                  echo $this->Form->input('domain_id', ['options' => $domains]);
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
         </div>
         <!-- Content -->

	</main>
<!-- End page Content -->
