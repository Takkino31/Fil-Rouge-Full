<?php

// src/DataPersister

namespace App\Datapersister;

use App\Entity\GroupeApprenant;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;

/**
 *
 */
class GroupeApprenantDataPersister implements DataPersisterInterface
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
        return $data instanceof GroupeApprenant;
    }

    /**
     * @param GroupeApprenant $data
     */
    public function persist($data)
    {
        $this->_entityManager->flush();
        return $data;
    }

    public function remove($data)
    {
        $data->setIsDrop(true);
        $this->_entityManager->flush();
    }
}