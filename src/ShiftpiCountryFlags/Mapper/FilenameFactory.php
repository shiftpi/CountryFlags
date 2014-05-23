<?php
namespace ShiftpiCountryFlags\Mapper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory for Filename mapper
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class FilenameFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Filename($serviceLocator->get('ShiftpiCountryFlags\Entity\Flag'));
    }
}