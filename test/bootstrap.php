<?php
/**
 * bootstrap.php -
 *
 * @created 31/10/2013 14:27
 * @author chris
 */

error_reporting(-1);

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

// Include the composer autoloader
$loader = require dirname(__DIR__) . '/vendor/autoload.php';
//$loader->add('Kurl\\Sdk\\Test', __DIR__);

