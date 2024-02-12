<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\Animal\Interfaces\CarnivoreInterface;
use AppZoo\Domain\Animal\Interfaces\FurryInterface;
use AppZoo\Domain\Food\Meat;

final class Fox extends Animal implements CarnivoreInterface, FurryInterface
{
    protected ?string $translatedSpeciesName = 'Lis';

    public function eat(Meat $food): void
    {
        $this->displayOnomatopoeicResponse('Hu Hu Auałau, dawaj kurke!');
    }

    public function brush(): void
    {
        $this->displayOnomatopoeicResponse('Hałuuuałł... Jeszcze kita!');
    }
}
