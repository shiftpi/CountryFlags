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
    /** @var string Path of the flag files */
    protected $dataPath;

    /** @var FlagEntity */
    protected $flagPrototype;

    /**
     * Constructor
     * @var FlagEntity $flagPrototype
     * @var string $dataPath
     */
    public function __construct(FlagEntity $flagPrototype, $dataPath)
    {
        $this->dataPath = $dataPath;
        $this->flagPrototype = $flagPrototype;
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