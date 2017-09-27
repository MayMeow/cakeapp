<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
/**
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 * dirname — Returns a parent directory's path
 */
define('ROOT', dirname(__DIR__));

/**
 * The full path to the actual working directory directory, WITHOUT a trailing DS.
 * Important if you want use script as commandline utility globally
 * getcwd — Gets the current working directory
 */
define('CLI_ROOT', getcwd());

/**
 * File path to the webroot directory.
 * To use as commandline globally change ROOT to CLI_ROOT.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * File path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path for certificate Templates
 */
define('REPOSITORIES_ROOT', ROOT . DS . 'repositories' . DS);