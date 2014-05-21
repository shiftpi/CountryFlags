<?php
namespace ShiftpiCountryFlags\Mapper;

class Filename implements MapperInterface
{
    protected $basePath;

    public function __construct()
    {
        $this->basePath = __DIR__ . '/../../../data/flags';
    }

    public function getByIsoCode($isoCode, $size)
    {
        $path = $this->basePath . '/' . $size . '/' . strtoupper($isoCode) . '.png';

        if (!file_exists($path) || !is_readable($path)) {
            return null;
        }

        return $path;
    }
}