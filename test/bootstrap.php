<?php
$autoloadPath =  __DIR__ . '/../../../vendor/autoload.php';
if (file_exists($autoloadPath)) {           // If the module is installed under /module
    require $autoloadPath;
} else {                                    // else it is installed under /vendor
    require __DIR__ . '/../../../autoload.php';
}

$loader = new \Zend\Loader\StandardAutoloader(array(
    \Zend\Loader\StandardAutoloader::LOAD_NS => array(
        'ShiftpiCountryFlags' => __DIR__ . '/../src/ShiftpiCountryFlags',
    ),
));

$loader->register();