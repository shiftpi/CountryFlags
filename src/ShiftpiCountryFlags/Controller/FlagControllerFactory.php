<?php
namespace ShiftpiCountryFlags\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory for FlagController
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class FlagControllerFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var ServiceLocatorInterface $serviceLocator */
        $serviceLocator = $serviceLocator->getServiceLocator();

        return new FlagController($serviceLocator->get('ShiftpiCountryFlags\Service\Flag'));
    }
}