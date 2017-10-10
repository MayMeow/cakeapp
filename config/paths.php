<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/**
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/**
 * The actual directory name for the application directory. Normally
 * named 'src'.
 */
define('APP_DIR', 'src');

/**
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR . DS);

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * Path to the tests directory.
 */
define('TESTS', ROOT . DS . 'tests' . DS);

/**
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' . DS);

/**
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' . DS);

/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' . DS);

/**
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');

/**
 * Path to the cake directory.
 */
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);

define('CAKE', CORE_PATH . 'src' . DS);


/**
 * MayMeow Cloud Documentation
 *
 *
 * Path to the documentation directory.
 */
define('DOCS', ROOT . DS . 'docs' . DS);

define('CERTIFICATES', ROOT . DS . 'certificates' . DS);

define('CAKE_LIB', ROOT . DS . 'lib' . DS);

/**
 * Path to Hooks
 */
define('CAKEAPP_SHELL_HOOKS', ROOT . DS . 'plugins' . DS . 'CakeAppShell' . DS . 'src' . DS . 'Hooks' . DS);

// on production enviroment change to  /var/opt/platform/data

// define('DATA_STORE', DS . 'cakeapp' . DS);

 define('DATA_STORE', ROOT . DS . 'data' . DS);

define('NO_SQL', DATA_STORE . 'may-db' . DS);

define('CA_ROOT', DATA_STORE . 'ca-data' . DS);

/**
 * MayMeow/MayCa data store path
 * Path to certificates storage
 */
define('TEMPLATE_ROOT', ROOT . DS . 'ca_templates' . DS);
