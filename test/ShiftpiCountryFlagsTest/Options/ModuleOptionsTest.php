<?php
namespace ShiftpiCountryFlagsTest\Options;

use ShiftpiCountryFlags\Options\ModuleOptions;

/**
 * Test for ShiftpiCountryFlags\Options\ModuleOptions
 * @coversDefaultClass ShiftpiCountryFlags\Options\ModuleOptions
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    /** @var ModuleOptions */
    protected $options;

    public function setUp()
    {
        $this->options = new ModuleOptions();
    }

    /**
     * @covers ::getDataPath
     */
    public function testGetEmptyDataPath()
    {
        $this->assertNotNull($this->options->getDataPath());
    }

    /**
     * @covers ::getDataPath
     */
    public function testGetNotEmptyDataPath()
    {
        $path = '/foo/bar';

        $this->options->setDataPath($path);
        $this->assertEquals($path, $this->options->getDataPath());
    }
} 