<?php
namespace ShiftpiCountryFlags\Service;

use ShiftpiCountryFlags\Mapper\MapperInterface;

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
     * @param MapperInterface $mapper
     */
    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param string $isoCode
     * @param int $size
     * @return string
     */
    public function find($isoCode, $size)
    {
        $path = $this->mapper->getByIsoCode($isoCode, $size);

        if ($path === null) {
            return $path;
        }

        return file_get_contents($path);
    }
} 