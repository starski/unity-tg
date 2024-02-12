<?php

namespace AppZoo\Domain\Zoo;

use AppZoo\Domain\Animal\Animal;
use InvalidArgumentException;

class Animals
{
    private array $animals = [];

    public function add(Animal $animal): void
    {
        foreach ($this->animals as $existingAnimal) {
            if ($existingAnimal == $animal) {
                throw new InvalidArgumentException($animal . " - this animal is already in the Zoo!" . PHP_EOL);
            }
        }

        $this->animals[] = $animal;
    }

    public function getAll(): array
    {
        return $this->animals;
    }
}
