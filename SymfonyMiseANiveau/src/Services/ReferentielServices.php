<?php

namespace App\Services;

use App\Entity\Referentiel;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ReferentielServices
{
    private $serializer;
    private $validator;

    public function __construct(SerializerInterface $serializer,ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator =$validator;
    }

    public function upload_programme($file,$referentiel){
        $file=fopen($file->getRealPath(),"rb");
        $referentiel->setProgramme($file);
    }

    public function add_referentiel($request,$skillsGrpRepo){
        $data=$request->request->all();
        $referentiel_to_add= new Referentiel();
        foreach ($data as $method => $value) {
            $method_set="set".ucfirst($method);
            if ($method_set!="setGroupeCompetences") {
                $referentiel_to_add->$method_set($value);
            }else {
                $skills_group=$value;
                foreach ($skills_group as $id_grp_skills) {
                    $skill_grp_to_add=$skillsGrpRepo->find($id_grp_skills);
                    if (!empty($skill_grp_to_add)) {
                        $referentiel_to_add->addGroupeCompetence($skill_grp_to_add);
                    }
                }
            }
        }

        $file=$request->files->get("programme");
        if (!empty($file)) {
            $this->upload_programme($file,$referentiel_to_add);
        }
        
        $errors=$this->validator->validate($referentiel_to_add);
        if (count($errors)>0) {
            return $errors;
        }
        return $referentiel_to_add;
    }

    public function put_referentiel($request,$skillsGrpRepo,$id,$refRepo){
        $referentiel=$refRepo->find($id);

        if(!empty($referentiel)){
            $data=$request->request->all();
            unset($data["_method"]);
            foreach ($data as $method => $value) {
                $method_set="set".ucfirst($method);
                if ($method_set!="setGroupeCompetences") {
                    $referentiel->$method_set($value);
                }
                elseif($method_set=="setGroupeCompetences") {
                    $skills_group=$value;
                    foreach ($skills_group as $id_grp_skills) {
                        $skill_grp_to_add=$skillsGrpRepo->find($id_grp_skills);
                        if (!empty($skill_grp_to_add)) {
                            $referentiel->addGroupeCompetence($skill_grp_to_add);
                            
                        }
                    }
                }
            }
            $file=$request->files->get("programme");
            if (!empty($file)) {
                $this->upload_programme($file,$referentiel);
            }
            $errors=$this->validator->validate($referentiel);
            if (count($errors)>0) {
                return $errors;
            }
            return $referentiel;
        }
        else {
            return $referentiel;
        }
    }
}
