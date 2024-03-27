<?php

namespace AppZoo\Domain\Animal;

use AppZoo\Domain\ValueObject\AnimalName;

abstract class Animal
{
    protected ?string $translatedSpeciesName;

    protected AnimalName $name;

    public function __construct(AnimalName $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return sprintf("%s o imieniu %s" . PHP_EOL,
            $this->translatedSpeciesName ?? $this::class,
            $this->name->getValue()
        );
    }

    protected function displayOnomatopoeicResponse($response): void
    {
        echo $response . PHP_EOL;
    }
}
