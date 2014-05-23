<?php
namespace ShiftpiCountryFlags\Mapper;

/**
 * Mapper between file path, country code and size
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class Filename implements MapperInterface
{
    /** @var string $basePath Path of the flag files */
    protected $basePath;

    /**
     * Constructor
     */
    public function __construct()
    {
        // TODO Move to config
        $this->basePath = __DIR__ . '/../../../data/flags';
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

        return $path;
    }
}