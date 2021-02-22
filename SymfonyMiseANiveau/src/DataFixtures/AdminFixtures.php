<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Admin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AdminFixtures extends Fixture implements DependentFixtureInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker=Factory::create ();
        
            $admin=new Admin();
            $profil=$this->getReference("admin");
            $password = 'admin';
            $password = $this->encoder->encodePassword($admin, $password);
            $admin->setNom($faker->lastname);
            $admin->setPrenom($faker->firstName);
            $admin->setEmail($faker->email);
            $admin->setUsername($faker->username);
            $admin->setPassword($password);
            $admin->setProfil($profil);
            
            $manager->persist($admin);
            $manager->flush();
    }

    public function getDependencies () {
        return array(ProfilFixtures::class);
    }
}
