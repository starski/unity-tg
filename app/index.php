<?php

use AppZoo\Application\Zoo\ZooService;
use AppZoo\Domain\Animal\Elephant;
use AppZoo\Domain\Animal\Goat;
use AppZoo\Domain\Animal\Rhino;
use AppZoo\Domain\Animal\SnowLepard;
use AppZoo\Domain\Animal\Tiger;
use AppZoo\Domain\Animal\Fox;
use AppZoo\Domain\ValueObject\AnimalName;
use AppZoo\Domain\Zoo\Zoo;

require_once __DIR__ . '/../vendor/autoload.php';


$zoo = new Zoo();

// Tworzymy serwis dla naszego zoo
$zooService = new ZooService($zoo);

$someAnimals = [
    new Tiger( new AnimalName('Felix')),
    new Elephant( new AnimalName('Benjamin')),
    new Rhino( new AnimalName('Ambrożek')),
    new Fox( new AnimalName('Rudolf')),
    new Goat(new AnimalName('Lambert')),
    new Goat(new AnimalName('Lambert')),
    new Goat(new AnimalName('Lambertina')),
    new SnowLepard(new AnimalName('Puszek')),
];

foreach ($someAnimals as $animal) {
    try {
        Zoo::displayInfo('Teraz dodaję: ' . $animal);
        $zooService->addAnimal($animal);
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

$zooService->feedAllAnimals();
$zooService->groomFurryAnimals();
