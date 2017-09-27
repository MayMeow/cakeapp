# CakeAuth plugin for CakePHP

This is part of Code Advent 2016

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require jdmaymeow/cake-auth
```

Load plugin

```bash
bin/cake plugin load CakeAuth -r
```


## Configure

To AppController Initialize add

```php
$this->loadComponent('Auth', [
            'authorize' => ['Controller'], // Added this line
            'loginRedirect' => [
                'controller' => 'Links',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ]
        ]);
```

Add after initialize function into main APpControler

```php
public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'display']);
    }

public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return false;
    }
```

## Standard Configuration

Allowed actions

|Role|Login|Logout|Index|Add|Edit|View|Delete|Display|
|---|---|---|---|---|---|---|---|---|
|Author|Yes|Yes|Yes|Yes|No|Yes|No|Yes|
|Admin|Yes|Yes|Yes|Yes|Yes|Yes|Yes|Yes|
