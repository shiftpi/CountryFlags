<?php
namespace ShiftpiCountryFlags\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory for CountryFlagUrl
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class CountryFlagUrlFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CountryFlagUrl($serviceLocator->getServiceLocator()->get('router'));
    }
}
