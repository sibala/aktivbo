<?php
/**
 * General settings for application
 */
 
/**
 * Set the error reporting.
 */
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('output_buffering', 0);
ini_set('pcre.jit', 0);
 
/**
 * Define application paths.
 */
define('ROOT_PATH', __DIR__ . '/..');
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('CSS_PATH', PUBLIC_PATH . '/css');
define('JS_PATH', PUBLIC_PATH . '/js');

/**
 * Include autoloader
 */
require_once ROOT_PATH . '/vendor/autoload.php';
 
/**
 * Initiate the app variable.
 */
$app = [];
 
/**
 * Site settings.
 */
$app['lang'] = 'sv';

/**
 * Settings for the database.
 */
$app['database']['dsn']            = 'mysql:host=127.0.0.1;dbname=aktivbo';
$app['database']['username']       = 'root';
$app['database']['password']       = '';
$app['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
