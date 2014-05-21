<?php
namespace ShiftpiCountryFlags\View\Helper;

use Zend\Mvc\Router\RouteStackInterface;
use Zend\View\Helper\AbstractHelper;
use ShiftpiCountryFlags\Service\Flag as FlagService;

class CountryFlagUrl extends AbstractHelper
{
    /** @var RouteStackInterface */
    protected $router;

    /**
     * @param RouteStackInterface $router
     */
    public function __construct(RouteStackInterface $router)
    {
        $this->router = $router;
    }

    public function __invoke($isoCode, $size = FlagService::SIZE_16)
    {
        return $this->router->assemble(array('country' => $isoCode, 'size' => $size), array('name' => 'isocode'));
    }
}