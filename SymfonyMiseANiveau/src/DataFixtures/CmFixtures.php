<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Cm;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CmFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker=Factory::create ();
        $community_manager=new Cm();
        $profil=$this->getReference("cm");
        $password ='cm';
        $password = $this->encoder->encodePassword($community_manager, $password);

        $community_manager->setNom($faker->lastname);
        $community_manager->setPrenom($faker->firstName);
        $community_manager->setEmail($faker->email);
        $community_manager->setUsername($faker->username);
        $community_manager->setPassword($password);
        $community_manager->setProfil($profil);
            
        
        $manager->persist($community_manager);
        $manager->flush();
    }

    public function getDependencies () {
        return array(ProfilFixtures::class);
    }
}