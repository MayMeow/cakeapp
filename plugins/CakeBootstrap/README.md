# Bootstrap plugin for CakePHP

[![build status](https://gitlab.cafe/gitlab/cakephp-bootstrap/badges/master/build.svg)](https://gitlab.cafe/gitlab/cakephp-bootstrap/commits/master)

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require jdmaymeow/cake-bootstrap
```

## Plugin Load

To load plugin run

```
bin\cake plugin load CakeBootstrap
```

or edit bootstrap php file and add followind line

```
Plugin::load('CakeBootstrap');
```

## Themes

If you want to use child themes update your appController with following code.

```
 public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('Modern');
    }
```

## Default theme

Open your `codeadvent.json` and add settings into CodeAdvent section

```json
{

"adminTheme" : "bootswatch/flatly/bootstrap.min"
}
```

Next update AppController beforeRender function with

```php
//Default theme for CakeBootstrap
$theme = Configure::read('CodeAdvent.adminTheme');
$this->set('CA_DEFAULT_ADMIN_THEME', $theme);
```

## Child Themes

### Configuration - Bootstrap

This themes using bootstrap framework please include in your composer.json file 'martin/bootstrap' package. This package will be continualy update. So u will have everytime new bootstrap release

### FontAwesome - optional

If you waht to use FontAwesome icons in your theme you dont need to download it from web. App comming with preloaded package of FontAwesome

You can add dependency to your composer.json if you want - martin\fontawesome

To load it you have to include FA css in your layout.

```
<?= $this->Html->css(Fontawesome.fontawesome.min) ?>
```

## Creating theme

Theme have same structure as plugin. So create one

```
bin\cake bake plugin <Your-Theme-Name>
```

this one will load it automatically. But if you installing it with composer you have to load it on your own

```
bin\cake plugin load <Your-Theme-Name> -r
```

## Layout

Layout will located in ```Template\Layout``` folder and have .ctp extension. So create layout front.ctp

Yo need include bootstrap css, so add following line into your head section.

```
<?= $this->Html->css(Bootstrap.bootstrap.min) ?>
```

Next you can include more css if you need it.

## Views templating

For example if you need create template for ContentManager Nodes Index. Create new index.ctp in

```
plugins\<Your-Theme-Name>\src\Template\Plugin\ContentManager\Nodes\index.ctp
```

Every plugin will have template in analogical path.

```
plugins\<Your-Theme-Name>\src\Template\Plugin\<Plugin-Name>\<Controller>\<action>.ctp
```

## Admin template top menu

If you want use top menu for admin template update following files

### AppController

add following lines or uncomment if you using `jdmaymeow/app`

```php
// ADMIN TOP MENU
$adminMenu = Configure::read('CakeBootstrap.adminTopMenu');
$this->set('MCLOUD_ADMIN_TOP_MENU', $adminMenu);
```

and add configuration into `codeadvent.json` file.

```json
"CodeAdvent": {
  "adminTopMenu" : "admin_top_menu"
}
```

And create menu element `admin_top_menu.ctp` in elements

```html
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    Admin
    <ul class="dropdown-menu">
        <li><a href="#">Test</a> </li>
    </ul>
</a>
```