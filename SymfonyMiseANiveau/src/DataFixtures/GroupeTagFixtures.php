<?php

namespace App\DataFixtures;

use App\Entity\GroupeTag;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GroupeTagFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $nbr_groupe_tag=5;
        for ($i=0; $i < $nbr_groupe_tag; $i++) { 
            $groupe_tag=new GroupeTag();
            $groupe_tag->setLibelle("Groupe de Tags ".$i);
            $nbr_tag=rand(1,4);
            for ($j=0; $j < $nbr_tag; $j++) {
                $groupe_tag->addTag($this->getReference(TagFixtures::TAG_REF.$i.$j));
            }      
            
            $manager->persist($groupe_tag);
        }
        $manager->flush();
    }

    public function getDependencies () {
        return array(TagFixtures::class);
    }
}
