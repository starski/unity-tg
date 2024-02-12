<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\Animal\Interfaces\CarnivoreInterface;
use AppZoo\Domain\Animal\Interfaces\FurryInterface;
use AppZoo\Domain\Food\Meat;

final class SnowLepard extends Animal implements CarnivoreInterface, FurryInterface
{
    protected ?string $translatedSpeciesName = 'Irbis śnieżny';

    public function eat(Meat $food): void
    {
        $this->displayOnomatopoeicResponse('RRRrrr, dobre mięsko!');
    }

    public function brush(): void
    {
        $this->displayOnomatopoeicResponse('Niom niom niom... dobry człowiek! ;)');
    }
}
