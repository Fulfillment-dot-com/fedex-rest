<?php

namespace FedexRest\Services\Ship\Type;

class CarrierCode
{
    const _FDXE = 'FDXE'; //Fedex Express
    const _FDXG = 'FDXG'; //Fedex Ground
    const _FXSP = 'FXSP'; //Fedex Smartpost
    const _FXCC = 'FXCC'; //Fedex Custom Critical

    const ALL = [self::_FDXE, self::_FDXG, self::_FXSP, self::_FXCC];
}