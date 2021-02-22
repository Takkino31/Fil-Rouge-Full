<?php

namespace App\DataFixtures;

use App\Entity\Promo;
use App\Repository\FormateurRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\ReferentielRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PromoFixtures extends Fixture
{
    private $formateurRepo;
    private $ReferentielRepo;

    public function __construct(FormateurRepository $formateurRepo, ReferentielRepository $ReferentielRepo)
    {
        $this->formateurRepo = $formateurRepo;
        $this->ReferentielRepo = $ReferentielRepo;
    }
    public function load(ObjectManager $manager)
    {
        
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 5; $i++) { 
            $promo = new Promo();
            $promo->setLangue('Français');
            $promo->setTitre('Titre de la promo '.$i);
            $promo->setDescription('Description de la promo '.$i);
            $promo->setLieu('Orange Digital Center');
            $nbr_teachers = rand (0,5);
            for ($i=0; $i < $nbr_teachers; $i++) { 
                $formateur = $this->formateurRepo->findOneBy(["promos"=>""]);
                dd($formateur);
            }
        }
        $manager->flush();
    }
}
