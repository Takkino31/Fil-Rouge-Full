<?php

namespace App\DataFixtures;

use App\Entity\ProfilSortie;
use App\DataFixtures\ApprenantFixtures;
use App\Repository\ApprenantRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilSortieFixtures extends Fixture
{
    private $appRepo;

    public function __construct(ApprenantRepository $appRepo)
    {
        $this->appRepo = $appRepo;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $tab_profiles = ['Developpement mobile','Developpeur front', 'Developpeur Back', 'Integrateur', 'Designer', 'Developpeur Wordpress', 'Data Artisan'];
        foreach ($tab_profiles as $profile) {
            $profile_sortie = new ProfilSortie();
            $profile_sortie -> setLibelle($profile);
            $nbr_apprenants = rand(0,3);
            for ($i=0; $i < $nbr_apprenants; $i++) { 
                $student = $this->appRepo->findOneBy(["profilSortie"=>null]);
                if ($student) {
                    $student->setProfilSortie($profile_sortie);
                    $manager ->persist($student);
                    $manager->flush();
                }
            }
            $manager->persist($profile_sortie);
        }
        $manager->flush();
    }

    public function getDependencies () {
        return array(ApprenantFixtures::class);
    }
}
