<?php

// src/DataPersister

namespace App\Datapersister;

use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use App\DataPersister\TagDataPersister;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
 

/**
 *
 */
class TagDataPersister implements DataPersisterInterface
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
        return $data instanceof Tag;
    }

    /**
     * @param Tag $data
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