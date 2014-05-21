<?php
return array(
    'service_manager' => array(
        'invokables' => array(
            'ShiftpiCountryFlags\Mapper\Filename' => 'ShiftpiCountryFlags\Mapper\Filename',
        ),
        'factories' => array(
            'ShiftpiCountryFlags\Service\Flag' => 'ShiftpiCountryFlags\Service\FlagFactory',
        )
    ),
    'controllers' => array(

    ),
);