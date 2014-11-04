<?php
/**
 * User: semihs
 * Date: 4.11.14
 * Time: 13:59
 */

return array(
    'noc-med-zf2-tinyurl' => array(
        'index' => 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    ),
    'view_helpers' => array(
        'factories' => array(
            'NocMed\TinyUrlHelper' => function ($sm) {
                return new \TinyUrl\View\Helper\TinyUrl($sm->getServiceLocator());
            },
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'NocMed\TinyUrlService' => function ($sm) {
                return new \TinyUrl\Service\TinyUrlService();
            },
        ),
    ),
);