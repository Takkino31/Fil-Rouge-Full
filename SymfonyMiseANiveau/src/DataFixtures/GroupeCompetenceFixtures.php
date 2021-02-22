<?php

namespace App\DataFixtures;

use App\Entity\GroupeCompetence;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GroupeCompetenceFixtures extends Fixture implements DependentFixtureInterface
{
    public CONST GROUPE_COMPETENCE_REF="groupe_competence";
    public function load(ObjectManager $manager)
    {
        $skills_groups=5;
        for ($i=0; $i < $skills_groups; $i++) { 
            $skill_group=new GroupeCompetence();
            $skill_group->setLibelle("Groupe Competence ".$i);
            $skill_group->setDescriptif("On va parler du descriptif du groupe de competence ".$i);

            $nbr_skills=rand(1,4);
            for ($j=1; $j <= $nbr_skills; $j++) { 
                $skill_group->addCompetence($this->getReference(CompetenceFixtures::COMPETENCE_REF.$j));
            }

            $this->addReference(self::GROUPE_COMPETENCE_REF.$i,$skill_group);

            $manager->persist($skill_group);
        }
        $manager->flush();
    }

    public function getDependencies () {
        return array(CompetenceFixtures::class);
    }
}
