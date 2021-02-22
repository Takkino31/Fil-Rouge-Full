<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Apprenant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker=Factory::create ();
        $apprenant=new Apprenant();
        $profil=$this->getReference('apprenant');
        
        $password = 'apprenant';
        $password = $this->encoder->encodePassword($apprenant, $password);
        $apprenant->setNom($faker->lastName);
        $apprenant->setPrenom($faker->firstName);
        $apprenant->setEmail($faker->email);
        $apprenant->setUsername($faker->username);
        $apprenant->setPassword($password);
        $apprenant->setStatut("En cours");
        $apprenant->setInfoComplementaires("Non Handicap, Maladifs...");
        $apprenant->setProfil($profil);
         
        $manager->persist($apprenant);
        $manager->flush();
}
    public function getDependencies () {
        return array(ProfilFixtures::class);
    }
}
