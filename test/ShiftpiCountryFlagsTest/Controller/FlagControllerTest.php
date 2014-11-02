<?php
namespace ShiftpiCountryFlagsTest\Controller;

use Zend\Http\Request;
use ShiftpiCountryFlags\Controller\FlagController;
use ShiftpiCountryFlags\Entity\Flag as FlagEntity;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Model\ViewModel;

/**
 * Test for ShiftpiCountryFlags\Controller\FlagController
 * @coversDefaultClass \ShiftpiCountryFlags\Controller\FlagController
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class FlagControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var FlagController */
    protected $controller;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $flagServiceMock;

    /** @var Request */
    protected $request;

    /** @var RouteMatch */
    protected $routeMatch;

    public function setUp()
    {
        $this->flagServiceMock = $this->getMock('ShiftpiCountryFlags\Service\Flag', array('find'), array(), '', false);
        $this->controller = new FlagController($this->flagServiceMock);

        $this->request = new Request();
        $this->routeMatch = new RouteMatch(array());
        $event = new MvcEvent();
        $event->setRouteMatch($this->routeMatch);
        $event->setRequest($this->request);
        $this->controller->setEvent($event);
    }

    /**
     * @covers ::indexAction
     */
    public function testSuccessWithSize()
    {
        $content = 'abc';
        $mimeType = 'text/plain';

        $flag = new FlagEntity();
        $flag->setContent($content);
        $flag->setMimeType($mimeType);
        $flag->setPath('/foo/bar');

        $this->flagServiceMock->expects($this->once())
            ->method('find')
            ->with($this->equalTo('xx'), $this->equalTo(32))
            ->will($this->returnValue($flag));

        $this->routeMatch->setParam('country', 'XX');
        $this->routeMatch->setParam('size', '32');

        /** @var Response $response */
        $response = $this->controller->indexAction();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($content, $response->getContent());
        $this->assertEquals($mimeType, $response->getHeaders()->get('Content-Type')->getFieldValue());
        $this->assertEquals(strlen($content), $response->getHeaders()->get('Content-Length')->getFieldValue());
    }

    /**
     * @covers ::indexAction
     */
    public function testSuccessWithoutSize()
    {
        $content = 'abc';
        $mimeType = 'text/plain';

        $flag = new FlagEntity();
        $flag->setContent($content);
        $flag->setMimeType($mimeType);
        $flag->setPath('/foo/bar');

        $this->flagServiceMock->expects($this->once())
            ->method('find')
            ->with($this->equalTo('xx'), $this->equalTo(16))
            ->will($this->returnValue($flag));

        $this->routeMatch->setParam('country', 'XX');

        /** @var Response $response */
        $response = $this->controller->indexAction();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($content, $response->getContent());
        $this->assertEquals($mimeType, $response->getHeaders()->get('Content-Type')->getFieldValue());
        $this->assertEquals(strlen($content), $response->getHeaders()->get('Content-Length')->getFieldValue());
    }

    /**
     * @covers ::indexAction
     */
    public function testNotFound()
    {
        $this->flagServiceMock->expects($this->once())
            ->method('find')
            ->with($this->equalTo('xx'), $this->equalTo(32))
            ->will($this->returnValue(null));

        $this->routeMatch->setParam('country', 'XX');
        $this->routeMatch->setParam('size', '32');

        $this->controller->indexAction();

        $this->assertEquals(404, $this->controller->getResponse()->getStatusCode());
    }
}