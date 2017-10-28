<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="May Meow Cloud Platform">
    <meta name="author" content="MCloud Team">
    <!-- Change navigation color for supported browsers -->
    <meta name="theme-color" content="#24292e">
    <link rel="icon" href="../../favicon.ico">

    <title><?= $this->fetch('title_for_page') ?>CakeApp</title>

    <!-- Page JS Plugins CSS -->
    <?= $this->fetch('css_for_page'); ?>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
    <?php echo $this->Html->css('CakeBootstrap.' . $CA_DEFAULT_ADMIN_THEME); ?>
    <?php //echo $this->Html->css('Emojione.emojione'); ?>
    <?php /*= $this->Html->css('CakeBootstrap.twbs/codeadvent2')*/ ?>

    <!-- Custom styles for this template -->
    <!-- <link href="sticky-footer-navbar.css" rel="stylesheet">-->
    <?php echo $this->Html->css('CakeBootstrap.app'); ?>
    <?= $this->Html->css('CakeBootstrap.twbs/indigo') ?>

    <!-- Cake Highlight -->
    <?php echo $this->Html->css('CakeHighlight.atom-one-dark'); ?>

    <!--font awesome 5-->
    <?php //echo $this->Html->script('CakeFontAwesome.packs/solid.min', ['defer']); ?>
    <?php //echo $this->Html->script('CakeFontAwesome.fontawesome.min', ['defer']); ?>

    <?php echo $this->Html->css('CakeFontAwesome.font-awesome-core'); ?>
    <?php echo $this->Html->css('CakeFontAwesome.font-awesome-solid'); ?>
    <?php echo $this->Html->css('CakeFontAwesome.font-awesome-light'); ?>
    <?php echo $this->Html->css('CakeFontAwesome.font-awesome-brands'); ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="<?= $this->fetch('page-bg-class') ?>">

<!-- Fixed navbar -->
<nav class="navbar navbar-cake navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" style="color: #ffffff;" href="/">
                CakeApp
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <li><a href="<?= $this->Url->build([
                        'prefix' => false, 'plugin' => 'CakeService',
                        'controller' => 'Issues', 'action' => 'index'
                    ]) ?>">Issues</a></li>
                <li><a href="<?= $this->Url->build([
                        'prefix' => false, 'plugin' => 'CakeResource',
                        'controller' => 'Projects', 'action' => 'index'
                    ]) ?>">Projects</a></li>
                <li><a href="<?= $this->Url->build([
                        'prefix' => false, 'plugin' => 'CakeStorage',
                        'controller' => 'GitRepositories', 'action' => 'index'
                    ]) ?>">Explore</a></li>
                <li><a href="<?= $this->Url->build([
                        'prefix' => false, 'plugin' => 'CakeStorage',
                        'controller' => 'GitRepositories', 'action' => 'index'
                    ]) ?>">Leila CI</a></li>
                <li><a href="<?= $this->Url->build([
                        'prefix' => 'admin', 'plugin' => 'CakeAuth',
                        'controller' => 'users', 'action' => 'index'
                    ]) ?>"><i class="fa fa-cog"></i></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <?php foreach ($crud_top_menu as $menu): ?>
                <li>
                    <?= $this->element('MayMeow.Crud/top_menu', ['top_menu' => $menu]) ?>
                </li>
                <?php endforeach; ?>

                <li>
                    <?= $this->element('CakeBootstrap.usermenu') ?>
                </li>
                <?= $MCLOUD_NAV_MENU ? $this->element('CakeBootstrap.navmenu') : '' ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Begin page content -->
<div class="gl-content" id="cake-vue-app">
    <?= $this->Flash->render() ?>
    <div class="row text-center" v-show="preload" style="display: none">
        <h1><i class="fa fa-sun-o fa-spin"></i></h1>
    </div>
    <div v-show="content">
        <?= $this->fetch('content') ?>
    </div>
</div>
<!-- End page Content -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<?php echo $this->Html->script('CakeBootstrap.jquery-1.12.1.min'); ?>
<?php echo $this->Html->script('vue'); ?>
<?php echo $this->Html->script('axios'); ?>
<?php echo $this->Html->script('commonmark'); ?>
<?php echo $this->Html->script('emojione.min'); ?>
<!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->

<?php echo $this->Html->script('CakeHighlight.highlight.pack'); ?>
<script>
    try {
        window.$ = window.jQuery = module.exports;
    } catch (e) {
    }

    hljs.initHighlightingOnLoad();

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="dropdown"]').dropdown();
        $('#myTabs a[href="#profile"]').tab('show');
        $('#myTabs a[href="#home"]').tab('show');
        $('#myTabs a[href="#articles"]').tab('show');
    })
</script>
<!-- <script src="../../dist/js/bootstrap.min.js"></script>-->
<?php echo $this->Html->script('CakeBootstrap.bootstrap.min'); ?>
<?= $this->fetch('scripts_for_page'); ?>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
