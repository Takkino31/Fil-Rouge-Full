<?php

namespace App\Controller;

use App\Entity\Referentiel;
use App\Entity\GroupeCompetence;
use App\Services\ReferentielServices;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReferentielRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\GroupeCompetenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReferentielController extends AbstractController
{

    /**
     * @Route("/api/admin/referentiels", name="add_referentiels", methods={"POST"})
     */

    public function add_referentiels(Request $request,GroupeCompetenceRepository $skillsGrpRepo,EntityManagerInterface $em,ReferentielServices $referentielService){
        $referentiel=$referentielService->add_referentiel($request,$skillsGrpRepo);
        if ($referentiel instanceof Referentiel) {
            $em->persist($referentiel);
            $em->flush();
            return $this->json($referentiel,Response::HTTP_OK);
        }
        else{
            return $this->json($referentiel, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/api/admin/referentiels/{id}", name="put_referentiels", methods={"PUT"})
     */

    public function put_referentiel($id,Request $request,ReferentielRepository $refRepo,GroupeCompetenceRepository $skillsGrpRepo,EntityManagerInterface $em,ReferentielServices $referentielService){

        $referentiel=$referentielService->put_referentiel($request,$skillsGrpRepo,$id,$refRepo);
         
        if ($referentiel instanceof Referentiel) {
            
            $em->persist($referentiel);
            $em->flush();
            return $this->json($referentiel,Response::HTTP_OK);
        }
        else {
            return $this->json($referentiel,Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/api/admin/referentiels/{id_ref}/groupecompetences/{id_grp_skills}", name="get_referentiel_grp_skills_only", methods={"GET"})
     */

    public function read_referentiel_grp_skills_only($id_ref,$id_grp_skills,GroupeCompetenceRepository $grpRepo,SerializerInterface $serializer){
        $grp_skills=$grpRepo->readSkillsFromReferentiel($id_ref,$id_grp_skills);
        
        if ($grp_skills instanceof GroupeCompetence) {
            $grp_skills=$serializer->normalize($grp_skills,null,["groups"=>["read:referentiel_skills_only"]]);
            return $this->json($grp_skills,Response::HTTP_OK);
        }
        else {
            return $this->json("Ce groupe de comptences n'existe pas pour ce referentiel",Response::HTTP_BAD_REQUEST);
        }
    }


}
