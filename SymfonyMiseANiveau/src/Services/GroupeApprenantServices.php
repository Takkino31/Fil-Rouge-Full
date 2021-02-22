<?php

namespace App\Services;

use App\Entity\GroupeApprenant;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GroupeApprenantServices{
    
    private $serializer;
    private $validator;

    public function __construct(SerializerInterface $serializer,ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator =$validator;
    }

    public function add_groupe_apprenant($request,$formateurRepo,$apprenantRepo){
        $data=$request->getContent();
        $grpApprenantTab = $this->serializer->decode($data, 'json');
        $teachers = $grpApprenantTab["formateurs"];
        $students = $grpApprenantTab["apprenants"];
        $grpApp= new GroupeApprenant();
        $grpApp->setNom($grpApprenantTab['nom']);
        $grpApp->setType($grpApprenantTab['type']);

        foreach ($teachers as $teacher_key) {
            foreach ($teacher_key as $teacher) {
                $teacher = $formateurRepo->find($teacher);
                $grpApp->addFormateur($teacher);
            }
        }

        foreach ($students as $student_key) {
            foreach ($student_key as $student) {
                $student = $apprenantRepo->find($student);
                $grpApp->addApprenant($student);
            }
        }
        $errors=$this->validator->validate($grpApp);
        if (count($errors)>0) {
            return $errors;
        }
        return $grpApp;
    }

    public function put_groupe_apprenant($grpApp,$request,$apprenantRepo){
        $data = $request->getContent();
        $grpApprenantTab = $this->serializer->decode($data, 'json');
        $students = $grpApprenantTab["apprenants"];
        foreach ($students as $key => $student) {
            $id_student_add=($student["id"]);
            $student = $apprenantRepo->find($id_student_add);
            if (!empty($student)) {
                $grpApp->addApprenant($student);
            }
        }
        $errors=$this->validator->validate($grpApp);
        if (count($errors)>0) {
            return $errors;
        }
        return $grpApp;
    }
}