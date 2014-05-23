<?php
namespace ShiftpiCountryFlagsTest\Service;

use ShiftpiCountryFlags\Service\MimeType;

/**
 * Test for ShiftpiCountryFlags\Service\MimeType
 * @covers ShiftpiCountryFlags\Service\MimeType
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class MimeTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var MimeType */
    protected $service;

    public function setUp()
    {
        $this->service = new MimeType();
    }

    public function testDetermineValid()
    {
        $this->assertEquals('text/plain', $this->service->determine('some text'));
    }
}