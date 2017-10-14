<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Metronic | Dashboard
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>

        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });

    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <!--begin::Page Vendors -->
    <!--<link href="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />-->
    <?= $this->Html->css('CakeMetronic./vendors/custom/fullcalendar/fullcalendar.bundle'); ?>
    <!--end::Page Vendors -->
    <!--<link href="./assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="./assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />-->
    <?= $this->Html->css('CakeMetronic./vendors/base/vendors.bundle'); ?>
    <?= $this->Html->css('CakeMetronic./demo/default/base/style.bundle'); ?>
    <?= $this->Html->css('CakeMetronic.custom.style'); ?>
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!--[html-partial:include:{"file":"_layout.html"}]/-->
<?= $this->fetch('content') ?>
<!--begin::Base Scripts -->
<!--<script src="./assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>-->
<!--<script src="./assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>-->
<?= $this->Html->script('CakeMetronic./vendors/base/vendors.bundle'); ?>
<?= $this->Html->script('CakeMetronic./demo/default/base/scripts.bundle'); ?>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<!--<script src="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>-->
<?= $this->Html->script('CakeMetronic./vendors/custom/fullcalendar/fullcalendar.bundle'); ?>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<!--<script src="./assets/app/js/dashboard.js" type="text/javascript"></script>-->
<?= $this->Html->script('CakeMetronic./app/js/dashboard'); ?>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
