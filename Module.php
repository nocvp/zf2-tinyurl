<?php
/**
 * User: semihs
 * Date: 4.11.14
 * Time: 13:47
 */

namespace NocMed\TinyUrl;

class Module implements
    \Zend\ModuleManager\Feature\ConfigProviderInterface
{

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . DIRECTORY_SEPARATOR . 'config/module.config.php';
    }
}