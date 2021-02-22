<?php

namespace App\Repository;

use App\Entity\GroupeCompetence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupeCompetence|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupeCompetence|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupeCompetence[]    findAll()
 * @method GroupeCompetence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeCompetenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupeCompetence::class);
    }

    // /**
    //  * @return GroupeCompetence[] Returns an array of GroupeCompetence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupeCompetence
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function readSkillsFromReferentiel($id_ref,$id_grp_skills){
        return $this->createQueryBuilder("grpSkills")
            ->innerJoin("grpSkills.referentiels","ref")
            ->andWhere("ref.id=:id_ref")
            ->setParameter("id_ref",$id_ref)
            ->andWhere("grpSkills.id=:id_grp_skills")
            ->setParameter("id_grp_skills",$id_grp_skills)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
