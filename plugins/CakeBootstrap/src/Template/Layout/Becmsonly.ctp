<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Rocket CMS</title>

    <!-- Page JS Plugins CSS -->
    <?= $this->fetch('css_for_page'); ?>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
    <?php echo $this->Html->css('CakeBootstrap.bootstrap.min'); ?>

    <!-- Coloring for Navigation-->
    <?php echo $this->Html->css('CakeBootstrap.twbs/heroku'); ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <!-- <link href="sticky-footer-navbar.css" rel="stylesheet">-->
    <?php echo $this->Html->css('CakeBootstrap.app'); ?>
    <?php echo $this->Html->css('Fontawesome.font-awesome.min'); ?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav nav-justified">
                <li><a href="/" class="navbar-brand" style="float: none"><strong>RocketCMS</strong> for developers</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Begin page content -->
<?= $this->fetch('content') ?>
<!-- End page Content -->

<footer class="footer">
    <div class="container">
        <p class="text-muted">RocketCMS.eu <span class="text-amethyst">0.7.4</span> &copy; 2015, crafted with <i class="fa fa-heart-o text-smooth"></i> by <a href="#">Martin</a> </p>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?= $this->fetch('scripts_for_page'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('[data-toggle="popover"]').popover()
    })
</script>
<!-- <script src="../../dist/js/bootstrap.min.js"></script>-->
<?php echo $this->Html->script('CakeBootstrap.bootstrap.min'); ?>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
