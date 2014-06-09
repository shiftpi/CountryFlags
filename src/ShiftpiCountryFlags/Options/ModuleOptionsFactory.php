<?php
namespace ShiftpiCountryFlags\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $config = $config['countryflags'];

        // return new ModuleOptions($config['mapper'], isset($config['datapath']) ? $config['datapath'] : null);
        return new ModuleOptions($config);
    }
}