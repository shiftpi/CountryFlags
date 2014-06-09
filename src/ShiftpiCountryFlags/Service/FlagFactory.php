<?php
namespace ShiftpiCountryFlags\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory for Flag Service
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class FlagFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \ShiftpiCountryFlags\Options\ModuleOptions $config */
        $config = $serviceLocator->get('ShiftpiCountryFlags\Options\ModuleOptions');

        return new Flag($serviceLocator->get($config->getMapper()),
            $serviceLocator->get('ShiftpiCountryFlags\Service\MimeType'));
    }
}