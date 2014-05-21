<?php
namespace ShiftpiCountryFlags\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CountryFlagUrlFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CountryFlagUrl($serviceLocator->getServiceLocator()->get('router'));
    }
}
