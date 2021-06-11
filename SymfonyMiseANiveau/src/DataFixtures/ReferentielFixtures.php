<?php

namespace App\DataFixtures;

use App\Entity\Referentiel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReferentielFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $nbr_ref=10;
        for ($i=0; $i < $nbr_ref; $i++) { 
            $referentiel=new Referentiel();
            $referentiel->setLibelle("Libelle du referentiel ".$i);
            $referentiel->setPresentation("Présentation du referentiel ".$i);
            $referentiel->setCritereEvaluation("Critere d'Evaluation du referentiel ".$i);
            $referentiel->setCritereAdmission("Critere d'Admission du referentiel ".$i);
            $nbr_grp_skills=\rand(1,4);
            for ($j=0; $j < $nbr_grp_skills; $j++) { 
                $referentiel->addGroupeCompetence($this->getReference(GroupeCompetenceFixtures::GROUPE_COMPETENCE_REF.$j));
            }
            $manager->persist($referentiel);
        }
        $manager->flush();
    }
    public function getDependencies () {
        return array(GroupeCompetenceFixtures::class);
    }
}
