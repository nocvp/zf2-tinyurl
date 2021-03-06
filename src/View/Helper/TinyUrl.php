<?php
/**
 * User: semihs
 * Date: 4.11.14
 * Time: 14:29
 */
namespace NocMed\TinyUrl\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class TinyUrl
 * @package TinyUrl\View\Helper
 */
class TinyUrl extends AbstractHelper {

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function __construct(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator($serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    /**
     * @return mixed
     */
    public function alphaID($in, $toNum = false, $padUp = false, $passKey = null) {
        $tinyUrlService = $this->getServiceLocator()->get('noc-med.tinyurl');
        
        return $tinyUrlService->alphaID($in, $toNum, $padUp, $passKey);
    }
} 