<?php

namespace AppZoo\Domain\Zoo;

use AppZoo\Domain\Animal\Animal;
use InvalidArgumentException;

class Animals
{
    private array $animals = [];

    public function add(Animal $animal): void
    {
        $this->checkIfExists($animal);
        $this->animals[] = $animal;
    }

    public function checkIfExists(Animal $animal): void
    {
        foreach ($this->animals as $existingAnimal) {
            if ($existingAnimal == $animal) {
                throw new InvalidArgumentException($animal . " - to zwierzę jest już w naszym Zoo!" . PHP_EOL);
            }
        }
    }

    public function getAll(): array
    {
        return $this->animals;
    }
}
