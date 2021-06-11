<?php

namespace App\DataFixtures;

use App\Entity\GroupeApprenant;
use App\Repository\ApprenantRepository;
use App\Repository\FormateurRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GroupeApprenantFixtures extends Fixture
{
    public function __construct(FormateurRepository $formaRepository,ApprenantRepository $apprenantRepository)
    {
        $this->formaRepo = $formaRepository;
        $this->apprenantRepo = $apprenantRepository;
    }
    public function load(ObjectManager $manager)
    {
        $type_groupe=["Principal","secondaire"];
        for ($i=0; $i < 5; $i++) { 
            $groupe=new GroupeApprenant();
            $rand=rand(0,1);
            $groupe->setType($type_groupe[$rand]);
            $groupe->setNom("Groupe $i".$type_groupe[$rand]);

            $nbTeachers= rand(1,4);
            $formateurs = $this->formaRepo->findAll();
            $my_teachers = count($formateurs) -1;

            for ($j=0; $j < $nbTeachers; $j++) {
                $teacher_to_select = rand(0,$my_teachers);
                $teacher = $formateurs [$teacher_to_select];
                $groupe->addFormateur($teacher);
            }
            
            $nbStudents = rand(2,15);
            $apprenants = $this->apprenantRepo->findAll();
            $my_students = count($apprenants) -1;

            for ($k=0; $k < $nbStudents; $k++) { 
                $student_to_select = rand(0,$my_students);
                $student = $apprenants[$student_to_select];
                $groupe->addApprenant($student);
            }
            $manager->persist($groupe);
        }
        $manager->flush();
    }
}
