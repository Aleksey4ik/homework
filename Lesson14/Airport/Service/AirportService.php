<?php

namespace MyProject\Service;

use MyProject\Models\Plane;                 

class AirportService {

    public function land(Plane $plane): void
    {
        $plane->setStatus('landed');
        echo 'Приземлился рейс № ' . $plane->getLine() . ' - Авиакомпания ' . $plane->getCarrier();
    }

    public function tookOff(Plane $plane): void
    {
        $plane->setStatus('took off');
        echo 'Взлетел рейс № ' . $plane->getLine() . ' - Авиакомпания ' . $plane->getCarrier();
    }
}