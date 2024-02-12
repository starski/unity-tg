<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\Animal\Interfaces\HerbivoreInterface;
use AppZoo\Domain\Food\Plant;

final class Elephant extends Animal implements HerbivoreInterface
{
    protected ?string $translatedSpeciesName = 'Słoń';

    public function eat(Plant $food): void
    {
        $this->displayOnomatopoeicResponse('Turrruuu... a gdzie orzeszki?!');
    }
}
