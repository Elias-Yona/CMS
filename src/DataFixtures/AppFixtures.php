<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $directoryRoot = dirname(__FILE__);

        $usersArray = $this->read_json($directoryRoot . "/data/users.json");

        foreach ($usersArray as $item) {
            $user = new User();

            $user->setFirstName($item['first_name']);
            $user->setLastName($item['last_name']);
            $user->setIdNumber($item['id_number']);
            $user->setEmail($item['email']);
            $user->setPassword($this->passwordHasher->hashPassword($user, $item['password']));
            $user->setStatus($item['status']);
            $user->setRoles(array($item['roles']));
            $manager->persist($user);
        }

        $manager->flush();
    }

    private function read_json(string $file): array
    {
        $jsonData = file_get_contents($file);

        if ($jsonData === false) {
            die("Failed to read the JSON file.");
        } else {
            $dataArray = json_decode($jsonData, true);

            if ($dataArray === null) {
                die("JSON decoding failed.");
            } else {
                return $dataArray;
            }
        }
    }
}
