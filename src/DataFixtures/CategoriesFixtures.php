<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
$categories = [
  1 => [
      'name' => 'Vehicules',
      'color' => '#ff80c0'
  ],
    2 => [
        'name' => 'Mobilier',
        'color' => '#80ffc0'
    ],
    3 => [
        'name' => 'Outils',
        'color' => '#ff50c0'
    ],
    4 => [
        'name' => 'Immoibilier',
        'color' => '#ff10c0'
    ],
];

foreach($categories as $key => $value){
    $categories = new Categorie();
    $categories->setName($value['name']);
    $categories->setDescription($value['color']);
    $manager->persist($categories);
}

$manager->flush();


    }
}
