<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApprenantRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 * @ApiResource(
 *      attributes={"deserialize"=false},
 *      collectionOperations={
 *          "get_apprenants"={
 *              "method"="GET",
 *              "path"="/apprenants",
 *              "normalization_context"={"groups"={"read:_students"}},
 *              "access_control"="(is_granted('ROLE_CM') or is_granted('ROLE_ADMIN'))",
 *              "access_control_message"="Non accès à cette ressource"
 *           }
 *      },
 *      itemOperations={
 *          "get_apprenant"=
 *              {
 *              "method"="GET",
 *              "path"="/apprenant/{id}",
 *              "normalization_context"={"groups"={"read:_student"}},
 *              "access_control"="(is_granted('ROLE_CM') or is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_APPRENANT'))",
 *              "access_control_message"="Non accès à cette ressource"
 *              },
 *          "put_apprenants"=
 *              {
 *              "method"="PUT",
 *              "path"="admin/users/{id}",
 *              "access_control"="(is_granted('ROLE_CM') or is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_APPRENANT'))",
 *              "access_control_message"="Non accès à cette ressource"
 *              }
 *      }
 * )
 */
class Apprenant extends User
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:_students","read:_student"})
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:_students","read:_student"})
     */
    private $infoComplementaires;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeApprenant::class, mappedBy="Apprenants")
     */
    private $groupeApprenants;

    /**
     * @ORM\ManyToOne(targetEntity=ProfilSortie::class, inversedBy="apprenants", cascade={"persist"})
     */
    private $profilSortie;

    public function __construct()
    {
        $this->groupeApprenants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getInfoComplementaires(): ?string
    {
        return $this->infoComplementaires;
    }

    public function setInfoComplementaires(?string $infoComplementaires): self
    {
        $this->infoComplementaires = $infoComplementaires;

        return $this;
    }

    /**
     * @return Collection|GroupeApprenant[]
     */
    public function getGroupeApprenants(): Collection
    {
        return $this->groupeApprenants;
    }

    public function addGroupeApprenant(GroupeApprenant $groupeApprenant): self
    {
        if (!$this->groupeApprenants->contains($groupeApprenant)) {
            $this->groupeApprenants[] = $groupeApprenant;
            $groupeApprenant->addApprenant($this);
        }

        return $this;
    }

    public function removeGroupeApprenant(GroupeApprenant $groupeApprenant): self
    {
        if ($this->groupeApprenants->removeElement($groupeApprenant)) {
            $groupeApprenant->removeApprenant($this);
        }

        return $this;
    }

    public function getProfilSortie(): ?ProfilSortie
    {
        return $this->profilSortie;
    }

    public function setProfilSortie(?ProfilSortie $profilSortie): self
    {
        $this->profilSortie = $profilSortie;

        return $this;
    }
}

