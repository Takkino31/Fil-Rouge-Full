<?php

namespace App\Controller;

use App\Entity\GroupeApprenant;
use App\Repository\ApprenantRepository;
use App\Repository\FormateurRepository;
use App\Repository\GroupeApprenantRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\GroupeApprenantServices;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GroupeApprenantController extends AbstractController
{
    private $grp_app_services;

    public function __construct(GroupeApprenantServices $grp_app_services)
    {
        $this->grp_app_services=$grp_app_services;
    }

    /**
     * @Route("/api/admin/groupes", name="post_grp_app" ,methods={"POST"})
     */
    public function addGroupeApprenant(Request $request, EntityManagerInterface $em, FormateurRepository $formateurRepo, ApprenantRepository $apprenantRepo)
    {
        $grpApp = $this->grp_app_services->add_groupe_apprenant($request, $formateurRepo, $apprenantRepo);
        if ((gettype($grpApp))=="string") {
            return $this->json($grpApp, Response::HTTP_FORBIDDEN);
        }
        if (!($grpApp instanceof GroupeApprenant)) {
            return $this->json($grpApp, Response::HTTP_BAD_REQUEST);
        }
        $em->persist($grpApp);
        $em->flush();
        return $this->json($grpApp, Response::HTTP_OK);
    }

    /**
     * @Route("/api/admin/groupes/{id}", name="put_grp_app" ,methods={"PUT"})
     */

    public function putGroupeApprenant($id, Request $request, EntityManagerInterface $em, GroupeApprenantRepository $grpAppRepo,ApprenantRepository $apprenantRepo)
    {
        $grpApp= $grpAppRepo->find($id);

            if (!empty($grpApp)) {
                $grpApp = $this->grp_app_services->put_groupe_apprenant($grpApp,$request,$apprenantRepo);
                if (!($grpApp instanceof GroupeApprenant)) {
                    return $this->json($grpApp, Response::HTTP_BAD_REQUEST);
                }
                $em->persist($grpApp);
                $em->flush();
                return $this->json($grpApp, Response::HTTP_OK);
            }
            
        return $this->json($grpApp, Response::HTTP_NOT_FOUND);
    }
}