<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\Animal\Interfaces\CarnivoreInterface;
use AppZoo\Domain\Animal\Interfaces\FurryInterface;
use AppZoo\Domain\Food\Meat;

final class Tiger extends Animal implements CarnivoreInterface, FurryInterface
{
    protected ?string $translatedSpeciesName = 'Tygrys';

    public function eat(Meat $food): void
    {
        $this->displayOnomatopoeicResponse('RRRrrr, dobre mięsko!');
    }

    public function brush(): void
    {
        $this->displayOnomatopoeicResponse('Mrrr...');
    }
}
