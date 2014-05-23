<?php
namespace ShiftpiCountryFlags\Service;

use ShiftpiCountryFlags\Mapper\MapperInterface;
use ShiftpiCountryFlags\Entity\Flag as FlagEntity;

/**
 * Flag Service
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class Flag
{
    const SIZE_16 = 16;
    const SIZE_24 = 24;
    const SIZE_32 = 32;
    const SIZE_48 = 48;
    const SIZE_64 = 64;

    /** @var MapperInterface */
    protected $mapper;

    /**
     * Constructor
     * @param MapperInterface $mapper
     */
    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Returns the binary data (always png) or NULL of a flag
     * @param string $isoCode ISO 3166 ALPHA-2 code
     * @param int $size
     * @return FlagEntity
     */
    public function find($isoCode, $size)
    {
        /** @var FlagEntity $flag */
        $flag = $this->mapper->getByIsoCode($isoCode, $size);

        if ($flag !== null) {
            $flag->setMimeType('image/png'); // TODO Determine MIME type
        }

        return $flag;
    }
} 