<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<?= $this->start('css_for_page'); ?>

<?php $this->end() ?>

<?= $this->start('scripts_for_page'); ?>
<?= $this->Html->script('/dist/static/js/manifest.b54eb931c4317655e20a') ?>
<?= $this->Html->script('/dist/static/js/vendor.f0d2e40725561298b787') ?>
<?= $this->Html->script('/dist/static/js/app.11aa0a7356390c2c6972') ?>
<?php $this->end() ?>

<div id="app"></div>
