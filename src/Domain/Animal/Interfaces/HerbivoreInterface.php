<?php

namespace AppZoo\Domain\Animal\Interfaces;

use AppZoo\Domain\Food\Plant;

interface HerbivoreInterface
{
    public function eat(Plant $food): void;
}
