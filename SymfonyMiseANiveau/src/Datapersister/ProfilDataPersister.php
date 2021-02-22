<?php

// src/DataPersister

namespace App\Datapersister;

use App\Entity\Profil;
use Doctrine\ORM\EntityManagerInterface;
use App\DataPersister\ProfilDataPersister;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
 

/**
 *
 */
class ProfilDataPersister implements DataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $_entityManager;

    public function __construct( EntityManagerInterface $entityManager ) 
    {
        $this->_entityManager = $entityManager;
    }

    
    public function supports($data): bool
    {
        return $data instanceof Profil;
    }

    /**
     * @param Profil $data
     */
    public function persist($data)
    {
        $this->_entityManager->flush();
        return $data;
    }

    public function remove($data)
    {
        $data->setIsDrop(true);
        foreach ($data->getUsers() as $u) {
            $u->setIsDrop(true);
        }
        $this->_entityManager->flush();
    }
}