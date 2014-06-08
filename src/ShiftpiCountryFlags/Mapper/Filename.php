<?php
namespace ShiftpiCountryFlags\Mapper;

use ShiftpiCountryFlags\Entity\Flag as FlagEntity;

/**
 * Mapper between file path, country code and size
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class Filename implements MapperInterface
{
    /** @var FlagEntity */
    protected $flagPrototype;

    /** @var string Path of the flag files */
    protected $dataPath;

    /**
     * Constructor
     * @var FlagEntity $flagPrototype
     * @var string $dataPath
     */
    public function __construct($flagPrototype, $dataPath)
    {
        $this->flagPrototype = $flagPrototype;
        $this->dataPath = $dataPath;
    }

    /**
     * @return FlagEntity
     */
    public function getFlagPrototype()
    {
        return $this->flagPrototype;
    }

    /**
     * @return string
     */
    public function getDataPath()
    {
        return $this->dataPath;
    }

    /**
     * @inheritdoc
     */
    public function getByIsoCode($isoCode, $size)
    {
        $matches = glob($this->dataPath . '/' . $size . '/' . strtoupper($isoCode) . '.*');

        if (count($matches) < 1) {
            return null;
        }

        $match = $matches[0];

        if (!is_readable($match)) {
            return null;
        }

        $this->flagPrototype->setPath($match);
        $this->flagPrototype->setContent(file_get_contents($match));

        return $this->flagPrototype;
    }
}