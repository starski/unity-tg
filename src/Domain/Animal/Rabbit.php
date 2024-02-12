<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\Animal\Interfaces\FurryInterface;
use AppZoo\Domain\Animal\Interfaces\HerbivoreInterface;
use AppZoo\Domain\Food\Food;

final class Rabbit extends Animal implements FurryInterface, HerbivoreInterface
{
    protected ?string $translatedSpeciesName = 'Królik';

    public function eat(Food $food): void
    {
        $this->displayOnomatopoeicResponse('Mniam mniam(?), dobra marchewka!');
    }

    public function brush(): void
    {
        $this->displayOnomatopoeicResponse('Kic... Tylko nie ogonek!!');
    }
}
