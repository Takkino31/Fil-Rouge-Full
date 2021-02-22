<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TagFixtures extends Fixture
{
    public CONST TAG_REF="tag_";
    public function load(ObjectManager $manager)
    {   for ($i=0; $i < 5; $i++) { 
            for ($j=0; $j < 4; $j++) { 
                $tag=new Tag();
                $tag->setDescriptif("Libellé du tag ".$j);
                $this->addReference(self::TAG_REF.$i.$j,$tag);
                $manager->persist($tag);
            }
        }         
            $manager->flush();
    }
}

