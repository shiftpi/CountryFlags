<?php
namespace ShiftpiCountryFlags\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Response as HttpResponse;
use ShiftpiCountryFlags\Service\Flag as FlagService;

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

    public function indexAction()
    {
        $country = strtolower($this->params()->fromRoute('country'));
        $size = (int) $this->params()->fromRoute('size', FlagService::SIZE_16);

        $flag = $this->flagService->find($country, $size);

        /** @var HttpResponse $response */
        $response = $this->response;

        if ($flag === null) {
            return $this->notFoundAction();
        }

        $response->setContent($flag);
        $response->getHeaders()->addHeaderLine('Content-Type', 'image/png');
        $response->getHeaders()->addHeaderLine('Content-Length', strlen($flag));

        return $response;
    }
} 