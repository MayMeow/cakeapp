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

    <title><?= $this->fetch('title_for_page') ?>Cake.Chat</title>

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
    <?php echo $this->Html->css('CakeFontAwesome.font-awesome.min'); ?>

    <!-- Cake Highlight -->
    <?php echo $this->Html->css('CakeHighlight.atom-one-dark'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="<?= $this->fetch('page-bg-class') ?>">

<!-- Fixed navbar -->


<!-- Begin page content -->
<div class="chat-content" id="cake-vue-app" v-cloak>
    <div class="sidebar-wrapper" style="padding-left: 10px; left: 220px; height: 100%; width: 220px; position: fixed; margin-left: -220px; background-color: #24292e; color: #ffffff;">
        <h2>{{room.name}}</h2>
    </div>
    <div class="content-wraper" style="padding-left: 220px;">
        <?= $this->Flash->render() ?>
        <div class="row text-center" v-show="preload" style="display: none">
            <h1><i class="fa fa-sun-o fa-spin"></i></h1>
        </div>
        <div v-show="content">
            <?= $this->fetch('content') ?>
        </div>
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
