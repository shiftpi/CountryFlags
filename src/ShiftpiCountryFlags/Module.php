<?php
namespace ShiftpiCountryFlags;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Module class
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}