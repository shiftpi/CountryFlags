<?php
namespace ShiftpiCountryFlagsTest\Service;

use ShiftpiCountryFlags\Service\Flag;
use ShiftpiCountryFlags\Entity\Flag as Entity;

/**
 * Test for ShiftpiCountryFlags\Service\Flag
 * @coversDefaultClass ShiftpiCountryFlags\Service\Flag
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class FlagTest extends \PHPUnit_Framework_TestCase
{
    /** @var Flag */
    protected $service;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $mapperMock;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $mimeTypeMock;

    public function setUp()
    {
        $this->mapperMock = $this->getMock('ShiftpiCountryFlags\Mapper\Filename', array('getByIsoCode'), array(), '',
            false);
        $this->mimeTypeMock = $this->getMock('ShiftpiCountryFlags\Service\MimeType', array('determine'), array(), '',
            false);

        $this->service = new Flag($this->mapperMock, $this->mimeTypeMock);
    }

    /**
     * @covers ::find
     */
    public function testFindValid()
    {
        $entity = new Entity();
        $entity->setMimeType('text/plain');
        $entity->setPath('/my/path');
        $entity->setContent('foo bar baz');

        $this->mapperMock->expects($this->once())
            ->method('getByIsoCode')
            ->with('BR', 32)
            ->will($this->returnValue($entity));

        $this->mimeTypeMock->expects($this->once())
            ->method('determine')
            ->with('foo bar baz')
            ->will($this->returnValue('text/plain'));

        $this->assertEquals($entity, $this->service->find('BR', 32));
    }

    /**
     * @covers ::find
     */
    public function testFindInvalid()
    {
        $this->mapperMock->expects($this->once())
            ->method('getByIsoCode')
            ->with('BR', 32)
            ->will($this->returnValue(null));

        $this->mimeTypeMock->expects($this->never())
            ->method('determine');

        $this->assertNull($this->service->find('BR', 32));
    }
}
 