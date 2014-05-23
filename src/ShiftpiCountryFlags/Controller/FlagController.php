<?php
namespace ShiftpiCountryFlags\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Response as HttpResponse;
use ShiftpiCountryFlags\Service\Flag as FlagService;

/**
 * FlagController
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class FlagController extends AbstractActionController
{
    /** @var FlagService */
    protected $flagService;

    /**
     * @param FlagService $flagService
     */
    public function __construct(FlagService $flagService)
    {
        $this->flagService = $flagService;
    }

    /**
     * Sends the flag or triggers a 404 error
     * @return array|HttpResponse
     */
    public function indexAction()
    {
        $country = strtolower($this->params()->fromRoute('country'));
        $size = (int) $this->params()->fromRoute('size', FlagService::SIZE_16);

        /** @var \ShiftpiCountryFlags\Entity\Flag $flag */
        $flag = $this->flagService->find($country, $size);

        /** @var HttpResponse $response */
        $response = $this->response;

        if ($flag === null) {
            return $this->notFoundAction();
        }

        $response->setContent($flag->getContent());
        $response->getHeaders()->addHeaderLine('Content-Type', $flag->getMimeType());
        $response->getHeaders()->addHeaderLine('Content-Length', strlen($flag->getContent()));

        return $response;
    }
} 