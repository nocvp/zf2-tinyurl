<?php
/**
 * Created by PhpStorm.
 * User: semihs
 * Date: 4.11.14
 * Time: 17:01
 */

namespace NocMed\TinyUrl\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use NocMed\TinyUrl\Service\TinyUrlService;

class TinyUrlFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $services
     *
     * @return TinyUrlService
     */
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('Config');

        $tinyUrlService = new TinyUrlService();
        $tinyUrlService->setConfigs($config);

        return $tinyUrlService;
    }
}