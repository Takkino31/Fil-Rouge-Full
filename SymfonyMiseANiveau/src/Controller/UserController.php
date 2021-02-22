<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Apprenant;
use App\Entity\Formateur;
use App\Services\UserServices;
use App\Repository\UserRepository;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    private $user_service;

    public function __construct(UserServices $user_service)
    {
        $this->user_service=$user_service;
    }

    /**
     * @Route("/api/admin/users", name="add_user",methods={"POST"})
     */

    public function add_user(Request $request,UserServices $user_service,EntityManagerInterface $em,ProfilRepository $profilRepo)

    {

        $user=$user_service->add_user($request,$profilRepo);
        // return $this->json($user);
        if (!($user instanceof User)) {
            return $this->json($user, Response::HTTP_BAD_REQUEST);
        }
        $em->persist($user);
        $em->flush();
        return $this->json($user, Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/admin/users/{id}", name="put_user",methods={"PUT","POST"})
     */

    public function put_user($id,Request $request,UserServices $user_service,EntityManagerInterface $em,UserRepository $userRepo,SerializerInterface $serializer,ProfilRepository $profilRepo)
    {
        // dd($request->files->get("avatar"));
        $user=$user_service->put_user($id,$request,$userRepo,$profilRepo);
        // return $this->json($user);
        if ((gettype($user))=="string") {
            return $this->json($user, Response::HTTP_FORBIDDEN);
        }
        if (!($user instanceof User)) {
            return $this->json($user, Response::HTTP_BAD_REQUEST);
        }
        $em->persist($user);
        $em->flush($user);
        return $this->json($user, Response::HTTP_OK);
    }
    
    // /**
    //  * @Route("/api/apprenants/{id}", name="put_apprenant",methods={"PUT"})
    //  */
    
    // public function put_apprenant($id,Request $request,UserServices $user_service,EntityManagerInterface $em,UserRepository $userRepo,SerializerInterface $serializer)

    // {
    //     $user=$user_service->put_user($id,$request,$userRepo);
    //     if ((gettype($user))=="string") {
    //         return $this->json($user, Response::HTTP_FORBIDDEN);
    //     }
    //     if (!($user instanceof Apprenant)) {
    //         return $this->json($user, Response::HTTP_BAD_REQUEST);
    //     }
    //     $em->persist($user);
    //     $em->flush();
    //     return $this->json(["message" => "Apprenant modifié."], Response::HTTP_OK);
    // }

    // /**
    //  * @Route("/api/formateurs/{id}", name="put_formateur",methods={"PUT"})
    //  */
    
    // public function put_formateur($id,Request $request,UserServices $user_service,EntityManagerInterface $em,UserRepository $userRepo,SerializerInterface $serializer)

    // {
    //     $user=$user_service->put_user($id,$request,$userRepo);
    //     if ((gettype($user))=="string") {
    //         return $this->json($user, Response::HTTP_FORBIDDEN);
    //     }
    //     if (!($user instanceof Formateur)) {
    //         return $this->json($user, Response::HTTP_BAD_REQUEST);
    //     }
    //     $em->persist($user);
    //     $em->flush();
    //     return $this->json(["message" => "Formateur modifié."], Response::HTTP_OK);
    // }

    /**
     * @Route("/api/admin/nbrusers", name="get_users_nbr",methods={"GET"})
     */

    public function nbrItem(){
        $em= $this->getDoctrine()->getManager();
        $repo = $em->getRepository(User::class);
        $items = $repo->createQueryBuilder('q')
                    ->select('count(q.id)')
                    ->where('q.isDrop = false')
                    ->getQuery()
                    ->getSingleScalarResult();
        return new Response($items);
    }
}
