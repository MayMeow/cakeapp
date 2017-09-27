<dl class="dl-horizontal">
    <dt>Licensed To</dt>
    <dd><?= $licenseData->getUser(); ?></dd>
    <dt>Valid until</dt>
    <dd><?= $this->Time->format($licenseData->getExpires()); ?></dd>
    <dt>Quantity</dt>
    <dd><?= $licenseData->getQuantity(); ?></dd>
    <dt>Type</dt>
    <dd><label class="label label-primary"><?= $licenseType ?></label> <?= $this->Html->link('More ...' , ['controller' => 'pages', 'action' => 'display', 'versions', 'prefix' => false])?></dd>
</dl>