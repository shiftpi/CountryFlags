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
        $path = $this->basePath . '/' . $size . '/' . strtoupper($isoCode) . '.png';

        if (!file_exists($path) || !is_readable($path)) {
            return null;
        }

        $this->flagPrototype->setPath($path);
        $this->flagPrototype->setContent(file_get_contents($path));

        return $this->flagPrototype;
    }
}