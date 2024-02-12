<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\Animal\Interfaces\OmnivoreInterface;
use AppZoo\Domain\Food\Meat;
use AppZoo\Domain\Food\Plant;

final class Rhino extends Animal implements OmnivoreInterface
{
    protected ?string $translatedSpeciesName = 'Nosorożec';

    public function eat(Plant|Meat $food): void
    {
        $this->displayOnomatopoeicResponse('Chryyy... co tak mało?!');
    }
}
