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
    /** @var string $basePath Path of the flag files */
    protected $basePath;

    /** @var FlagEntity */
    protected $flagPrototype;

    /**
     * Constructor
     */
    public function __construct(FlagEntity $flagPrototype)
    {
        $this->basePath = __DIR__ . '/../../../data/flags';             // TODO Move to config
        $this->flagPrototype = $flagPrototype;
    }

    /**
     * @inheritdoc
     */
    public function getByIsoCode($isoCode, $size)
    {
        $matches = glob($this->basePath . '/' . $size . '/' . strtoupper($isoCode) . '.*');

        if (count($matches) < 1) {
            return null;
        }

        $match = $matches[0];

        if (!file_exists($match) || !is_readable($match)) {
            return null;
        }

        $this->flagPrototype->setPath($match);
        $this->flagPrototype->setContent(file_get_contents($match));

        return $this->flagPrototype;
    }
}