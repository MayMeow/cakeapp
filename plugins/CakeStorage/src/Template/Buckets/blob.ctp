<?php $this->layout = 'CakeBootstrap.default'; ?>

<?php $this->start('admin_menu'); ?>
<?= $this->element('CakeStorage.admin_menu') ?>
<?php $this->end() ?>

<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<?php $this->start('scripts_for_page'); ?>
<?= $this->Html->script('clipboard.min') ?>

<?= $this->Html->script('ace/ace') ?>
<?= $this->Html->script('ace/theme-monokai') ?>
<?= $this->Html->script('ace/ext-modelist') ?>

<script>
/*Ace Editor*/
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");

/*Create text area for source code and hide it*/
var textarea = $('textarea[name="fileContent"]').hide();

editor.setValue(textarea.text(), -1);

/*On any change in editor update our textarea*/
editor.getSession().on("change", function () {
    textarea.val(editor.getSession().getValue());
});

var modelist = ace.require("ace/ext/modelist");
var filePath = "<?= $filePath ?>";
var mode = modelist.getModeForPath(filePath).mode;
editor.session.setMode(mode);

editor.setOptions({
    maxLines: Infinity,
    showPrintMargin: false
});

/*Clipboard*/
var clipboard = new Clipboard('.copy');

clipboard.on('success', function(e) {
    console.log(e);
});

clipboard.on('error', function(e) {
    console.log(e);
});
</script>

<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container-fluid">
        <h3><i class="fa fa-bitbucket"></i> Blob / <?= $filePath ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Bucket'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Buckets'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Bucket'), ['action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>

        <?= $this->element('CakeStorage.admin_menu') ?>

    </div>
</div>


<!-- Begin page content -->
<main id="main-container" style="background-color: #272822;">

    <!-- Content -->
    <div class="container-fluid">

        <!--<div class="row" style="padding-bottom: 10px">
            <div class="col-md-12 text-right">
                <?/*= $this->Html->link(__('<i class="fa fa-plus"></i> Create new file'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) */?>
                <?/*= $this->Html->link(__('<i class="fa fa-cloud-upload"></i> Add new file'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) */?>
            </div>
        </div>-->

        <div class="row">
            <div class="col-md-12">

                <div id="editor"></div>



            </div>
        </div>

        <div class="row" style="background-color: #ffffff; padding-bottom: 25px">
            <div class="col-md-10">
                <?= $this->Form->create() ?>
                <?= $this->Form->input('fileContent', ['type' => 'textarea', 'value' => $fileContent, 'label' => false]) ?>
                <?= $this->Form->input('commit') ?>
                <?= $this->Form->submit('Save Changes') ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>



    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
