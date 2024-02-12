<?php

namespace AppZoo\Application\Zoo;

use AppZoo\Domain\Animal\Animal;
use AppZoo\Domain\Zoo\Zoo;

class ZooService
{
    private Zoo $zoo;

    public function __construct(Zoo $zoo)
    {
        $this->zoo = $zoo;
    }

    public function addAnimal(Animal $animal): void
    {
        $this->zoo->addAnimal($animal);
    }

    public function feedAllAnimals(): void
    {
        $this->zoo->feedAnimals();
    }

    public function groomFurryAnimals(): void
    {
        $this->zoo->groomAnimals();
    }
}
