<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbUsers = 1; $nbUsers <= 30; $nbUsers++) {
            $user = new User();
            $user->setEmail($faker->email);
//            if ($nbUsers === 60) {
//                $user->setRoles(['ROLE_ADMIN']);
//            } else {
                $user->setRoles(['ROLE_USER']);
                $user->setPassword($faker->password($minLength=6,$maxLength=20));
                $user->setFirstname($faker->firstNameMale);
                $user->setLastname($faker->lastName);
//        $user->setIsVerified($faker->numberBetween(0,1));
                $manager->persist($user);
//            }

            $manager->flush();

        }


//foreach($categories as $key => $value){
//    $categories = new Categorie();
//    $categories->setName($value['name']);
//    $categories->setDescription($value['color']);
//    $manager->persist($categories);
    }

//$manager->flush();

}
