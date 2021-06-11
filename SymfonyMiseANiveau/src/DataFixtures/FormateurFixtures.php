<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Formateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FormateurFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker=Factory::create ();
        $formateur=new Formateur();
        $profil=$this->getReference("formateur");

        $password = 'formateur';
        $password = $this->encoder->encodePassword($formateur, $password);
        
        $formateur->setNom($faker->lastname);
        $formateur->setPrenom($faker->firstName);
        $formateur->setEmail($faker->email);
        $formateur->setUsername($faker->username);
        $formateur->setPassword($password);
        $formateur->setProfil($profil);
        
        $manager->persist($formateur);
        $manager->flush();
    }

    public function getDependencies () {
        return array(ProfilFixtures::class);
    }
}
