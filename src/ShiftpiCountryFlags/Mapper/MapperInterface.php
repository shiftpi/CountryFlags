<?php
namespace ShiftpiCountryFlags\Mapper;

/**
 * MapperInterface
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
interface MapperInterface
{
    /**
     * Returns the path of the flag or NULL if the flag was not found
     * @param string $isoCode ISO 3166 ALPHA-2 code
     * @param int $size
     * @return null|string
     */
    public function getByIsoCode($isoCode, $size);
} 