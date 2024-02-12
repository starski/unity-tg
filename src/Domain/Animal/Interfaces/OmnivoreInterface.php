<?php

namespace AppZoo\Domain\Animal\Interfaces;

use AppZoo\Domain\Food\Meat;
use AppZoo\Domain\Food\Plant;

interface OmnivoreInterface extends HerbivoreInterface, CarnivoreInterface
{
    #[\Override] public function eat(Plant|Meat $food): void;
}
