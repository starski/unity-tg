<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\Animal\Interfaces\CarnivoreInterface;
use AppZoo\Domain\Animal\Interfaces\FurryInterface;
use AppZoo\Domain\Animal\Interfaces\HerbivoreInterface;
use AppZoo\Domain\Food\Food;

class Goat extends Animal implements CarnivoreInterface, HerbivoreInterface, FurryInterface
{
    protected ?string $translatedSpeciesName = 'Koza';

    public function eat(Food $food): void
    {
        $this->displayOnomatopoeicResponse('Meee/Blalabalalalaba! znowu mięcho?! Ale ja jem wszystko!!!');
    }

    public function brush(): void
    {
        $this->displayOnomatopoeicResponse('Meee/Blalabalalalaba! Pfu!');
    }
}
