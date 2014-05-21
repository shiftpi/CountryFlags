<?php
namespace ShiftpiCountryFlags\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FlagFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $mapperClass = $config['countryflags']['mapper'];

        return new Flag($serviceLocator->get($mapperClass));
    }
}