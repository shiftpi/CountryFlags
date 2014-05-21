<?php
namespace ShiftpiCountryFlags\Mapper;

interface MapperInterface
{
    public function getByIsoCode($isoCode, $size);
} 