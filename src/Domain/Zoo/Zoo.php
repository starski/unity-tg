<?php

namespace AppZoo\Domain\Zoo;

use AppZoo\Domain\Animal\Animal;
use AppZoo\Domain\Animal\Interfaces\CarnivoreInterface;
use AppZoo\Domain\Animal\Interfaces\FurryInterface;
use AppZoo\Domain\Animal\Interfaces\OmnivoreInterface;
use AppZoo\Domain\Food\Meat;
use AppZoo\Domain\Food\Plant;

class Zoo
{
    private Animals $animals;

    public function __construct()
    {
        $this->animals = new Animals();
    }

    public function addAnimal(Animal $animal): void
    {
        $this->animals->add($animal);
    }

    public function feedAnimals(): void
    {
        foreach ($this->animals->getAll() as $animal) {
            self::displayInfo('Teraz karmię: ' . $animal);
            if ($animal instanceof OmnivoreInterface) {
                $this->feedCarnivoreAnimal($animal);
                $this->feedHerbivoreAnimal($animal);
            } elseif ($animal instanceof CarnivoreInterface) {
                $this->feedCarnivoreAnimal($animal);
            } else {
                $this->feedHerbivoreAnimal($animal);
            }
        }
    }

    public function groomAnimals(): void
    {
        foreach($this->animals->getAll() as $animal) {
            if ($animal instanceof FurryInterface) {
                self::displayInfo('Teraz czeszę: ' . $animal);
                $animal->brush();
                self::displayInfo(PHP_EOL);
            }
        }
    }

    public function feedCarnivoreAnimal(Animal $animal): void
    {
        $animal->eat(new Meat());
        self::displayInfo(PHP_EOL);
    }

    public function feedHerbivoreAnimal(Animal $animal): void
    {
        $animal->eat(new Plant());
        self::displayInfo(PHP_EOL);
    }

    static function displayInfo($info): void
    {
        echo $info;
    }
}
