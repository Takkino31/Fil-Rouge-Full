<?php

namespace App\Services;

use App\Entity\Cm;
use App\Entity\User;
use App\Entity\Admin;
use App\Entity\Apprenant;
use App\Entity\Formateur;
use App\Repository\UserRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserServices
{
    private $serializer;
    private $validator;
    private $encoder;
    private $userRepo;

    public function __construct(SerializerInterface $serializer,UserPasswordEncoderInterface $encoder,UserRepository $userRepo,ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->encoder = $encoder;
        $this->userRepo = $userRepo;
        $this->validator =$validator;
    }

    public function upload_image($image,$user){
        $image=fopen($image->getRealPath(),"rb");
        $user->setAvatar($image);
    }

    public function get_profil_libelle($entityPath){
        $entityPath=explode('\\',$entityPath);
        $taille=count($entityPath)-1;
        return $entityPath[$taille];
    }


    public function add_user($request,$profilRepo){
        $data = $request->request->all();
        if (!$data) {
            $data = json_decode($request->getContent(), true);
        }
        $entity=ucwords(strtolower($data["profil"]));
        $password=strtolower($entity);
        $entity="App\Entity\\".$entity;
        $profil = strtoupper($data["profil"]);
        $profil=$profilRepo->findOneBy(["libelle"=>$profil]);
        unset($data["profil"]);
        $user = $this->serializer->denormalize($data, $entity, true);
        $user->setProfil($profil);
        $password = $this->encoder->encodePassword($user, $password);
        $user->setPassword($password);
        $image=($request->files->get("avatar"));
        if(!empty($image)){
            $this->upload_image($image,$user);
        }

        $errors=$this->validator->validate($user);       
        if (count($errors)>0) {
            return $errors;
        }
        return $user;
    }

    public function put_user($id,$request,$userRepo,$profilRepo){
        $user=$userRepo->find($id);
        if(empty($user)){
            return "cet utilisateur n'existe pas";
        }
        $data=$request->request->all();
        if (!$data) {
            $data = json_decode($request->getContent(),true);
        }
        // return $data;

        foreach ($data as $attribute_key => $attribute_value) {
            $method_set="set".ucfirst($attribute_key);
            if ($attribute_key!="_method") {
                if ($attribute_key == "password") {
                    $attribute_value = $this->encoder->encodePassword($user, $attribute_value);
                }
                if ($attribute_key == "profil") {
                    $attribute_value=$profilRepo->findOneBy(["libelle"=>$data['profil']]);
                }
                $user->$method_set($attribute_value);
            }    
        }
        $image=($request->files->get("avatar"));
        // dd($image);
        if(!empty($image)){
            $this->upload_image($image,$user);
        }
        $errors=$this->validator->validate($user);
        if (count($errors)>0) {
            return $errors;
        }
        return $user;
    }
}
