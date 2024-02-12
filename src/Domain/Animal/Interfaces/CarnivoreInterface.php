<?php

namespace AppZoo\Domain\Animal\Interfaces;

use AppZoo\Domain\Food\Meat;

interface CarnivoreInterface
{
    public function eat(Meat $food): void;
}
