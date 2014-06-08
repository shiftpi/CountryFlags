<?php
namespace ShiftpiCountryFlagsTest\Mapper;

use ShiftpiCountryFlags\Mapper\Filename as Mapper;
use ShiftpiCountryFlags\Entity\Flag as FlagEntity;

/**
 * Test for ShiftpiCountryFlags\Mapper\Filename
 * @covers ShiftpiCountryFlags\Mapper\Filename
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class FilenameTest extends \PHPUnit_Framework_TestCase
{
    /** @var string */
    protected $flagPath;

    /** @var int */
    protected $oldZzPermission;

    public function setUp()
    {
        $this->flagPath = __DIR__ . '/../../data/32';
    }

    public function testConstructor()
    {
        $classA = new \stdClass();

        $mapper = new Mapper($classA, 'foo');

        $this->assertEquals($classA, $mapper->getFlagPrototype());
        $this->assertEquals('foo', $mapper->getDataPath());
    }

    public function testGetByIsoCodeExists()
    {
        $flagPath = $this->flagPath . '/XY.txt';

        $result = new FlagEntity();
        $result->setPath($flagPath);
        $result->setContent(file_get_contents($flagPath));

        $mapper = new Mapper(new FlagEntity(), dirname($this->flagPath));
        $this->assertEquals($result, $mapper->getByIsoCode('XY', 32));
    }

    public function testGetByIsoCodeDoesntExist()
    {
        $mapper = new Mapper(new FlagEntity(), dirname($this->flagPath));
        $this->assertNull($mapper->getByIsoCode('YY', 32));
    }

    public function testGetByIsoCodeNotReadable()
    {
        $flagPath = $this->flagPath . '/ZZ.txt';

        // Set file permissions to not readable
        $oldPermission = @fileperms($flagPath);
        if (!@chmod($flagPath, 0220)) {
            $this->markTestSkipped('Test could not be executed because chmod failed');
        }

        $mapper = new Mapper(new FlagEntity(), dirname($this->flagPath));
        $this->assertNull($mapper->getByIsoCode('ZZ', 32));

        chmod($flagPath, $oldPermission);                               // Reset file permissions
    }
}
 