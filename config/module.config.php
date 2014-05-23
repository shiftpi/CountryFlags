<?php
return array(
    'service_manager' => array(
        'invokables' => array(
            'ShiftpiCountryFlags\Entity\Flag' => 'ShiftpiCountryFlags\Entity\Flag',
        ),
        'factories' => array(
            'ShiftpiCountryFlags\Mapper\Filename' => 'ShiftpiCountryFlags\Mapper\FilenameFactory',
            'ShiftpiCountryFlags\Service\Flag' => 'ShiftpiCountryFlags\Service\FlagFactory',
        ),
        'shared' => array(
            'ShiftpiCountryFlags\Entity\Flag' => false,
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'ShiftpiCountryFlags\Controller\FlagController' => 'ShiftpiCountryFlags\Controller\FlagControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'isocode' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/countryflags/:country[/:size]',
                    'constraints' => array(
                        'country' => '[a-zA-Z]{2}',
                        'size' => '\d{2}',
                    ),
                    'defaults' => array(
                        'controller' => 'ShiftpiCountryFlags\Controller\FlagController',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'countryFlagUrl' => 'ShiftpiCountryFlags\View\Helper\CountryFlagUrlFactory',
        ),
    ),
);