<?php
namespace ShiftpiCountryFlags\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Factory for Filename mapper
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class ModuleOptions extends AbstractOptions
{
    /** @var string */
    protected $mapper;

    /** @var string */
    protected $dataPath;

    /**
     * @param string $mapper
     */
    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @return string
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param string $dataPath
     */
    public function setDataPath($dataPath)
    {
        $this->dataPath = $dataPath;
    }

    /**
     * @return string
     */
    public function getDataPath()
    {
        if ($this->dataPath === null) {
            return __DIR__ . '/../../../data/flags';
        }

        return $this->dataPath;
    }
}