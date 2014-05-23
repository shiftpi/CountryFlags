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
        $config = $serviceLocator->get('config');
        $mapperClass = $config['countryflags']['mapper'];

        return new Flag($serviceLocator->get($mapperClass),
            $serviceLocator->get('ShiftpiCountryFlags\Service\MimeType'));
    }
}