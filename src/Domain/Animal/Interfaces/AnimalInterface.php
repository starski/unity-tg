<?php

namespace AppZoo\Domain\Animal\Interfaces;

use AppZoo\Domain\Food\Food;

interface AnimalInterface
{
    public function eat(Food $food): void;
}
