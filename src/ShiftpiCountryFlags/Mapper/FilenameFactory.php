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
        /** @var \ShiftpiCountryFlags\Options\ModuleOptions $config */
        $config = $serviceLocator->get('ShiftpiCountryFlags\Options\ModuleOptions');
        $dataPath = $config->getDataPath();

        if (!file_exists($dataPath)) {
            throw new \Exception('Invalid data path ' . $dataPath);
        }

        return new Filename($serviceLocator->get('ShiftpiCountryFlags\Entity\Flag'), $dataPath);
    }
}