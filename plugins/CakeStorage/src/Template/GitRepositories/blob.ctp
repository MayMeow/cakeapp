<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>


<?php $this->start('scripts_for_page'); ?>

<?= $this->Html->script('ace/ace') ?>
<?= $this->Html->script('ace/theme-monokai') ?>
<?= $this->Html->script('ace/ext-modelist') ?>

<script>
    /*Ace Editor*/
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");

    /*Create text area for source code and hide it*/
    var textarea = $('textarea[name="output"]').hide();

    editor.setValue(textarea.text(), -1);

    /*On any change in editor update our textarea*/
    editor.getSession().on("change", function () {
        textarea.val(editor.getSession().getValue());
    });

    var modelist = ace.require("ace/ext/modelist");
    var mode = modelist.getModeForPath("<?= $fileName ?>").mode;
    editor.session.setMode(mode);

    editor.setOptions({
        maxLines: Infinity,
        showPrintMargin: false
    });
</script>

<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-git"></i></a></li>
            <li><a href="#"><?= $gitRepository->user->username ?> <i class="fa fa-user-circle-o"></i></a></li>
            <li class="active"><?= h($gitRepository->name) ?></li>
        </ol>

        <h3 class="mTop5"><strong>Commits</strong>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Git Repository'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Html->link(__('<i class="fa fa-level-up"></i>'), ['action' => 'index'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Git Repository'), ['action' => 'edit', $gitRepository->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Git Repositories'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Git Repository'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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

        <div style="padding-bottom: 15px; font-size: 1.17em">
            <?= $this->Emoji->parse($gitRepository->description) ?>
        </div>

        <div class="row text-center">
            <div class="col-md-12" style="margin-bottom: 20px">
                <?= $this->element('MayMeow.Crud/button_group', ['btn_group' => $view_menu]) ?>
            </div>
        </div>

        <?php // $this->element('CakeStorage.Git/info') ?>

        <div class="row">
            <div class="col-md-12">
                <div id="editor"></div>
            </div>
        </div>

        <?= $this->Form->input('output', ['type' => 'textarea', 'value' => $output, 'label' => false]) ?>
        <!-- Content -->

</main>
<!-- End page Content -->
