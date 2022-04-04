<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;
    
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }


    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user= new User();
        $user->setEmail('amboara@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordHasher->hashPassword($user, '1234'));
        $manager->persist($user);
    
        $user2 = new User();
        $user2->setEmail('durand@yahoo.fr');
        $user2->setPassword($this->passwordHasher->hashPassword($user2, '0000'));
        $manager->persist($user2);

        $manager->flush();
    }
}
