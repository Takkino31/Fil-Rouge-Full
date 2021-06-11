<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormateurRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 * @ApiResource(
 * collectionOperations={
 *           "get_formateurs"={
 *              "method"="GET",
 *              "path"="/formateurs",
 *              "normalization_context"={"groups"={"read:_formateurs"}},
 *              "access_control"="(is_granted('ROLE_CM') or is_granted('ROLE_ADMIN'))",
 *              "access_control_message"="Non accès à cette ressource"
 *           },
 *      },
 * itemOperations={
 *           "get_formateur"={
 *              "method"="GET",
 *              "path"="/formateurs/{id}",
 *              "normalization_context"={"groups"={"read:_formateur"}},
 *              "access_control"="(is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_ADMIN'))",
 *              "access_control_message"="Non accès à cette ressource"
 *           },
 *          "put_formateur"={
 *              "method"="PUT",
 *              "path"="formateurs/{id}",
 *              "access_control"="(is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR'))",
 *              "access_control_message"="Non accès à cette ressource"
 *           },
 *      }
 * )
 */
class Formateur extends User
{
    /**
     * @ORM\ManyToMany(targetEntity=GroupeApprenant::class, mappedBy="formateurs")
     */
    private $groupeApprenants;

    /**
     * @ORM\ManyToMany(targetEntity=Promo::class, mappedBy="formateurs")
     */
    private $promos;

    public function __construct()
    {
        $this->groupeApprenants = new ArrayCollection();
        $this->promos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $groupeApprenant->addFormateur($this);
        }

        return $this;
    }

    public function removeGroupeApprenant(GroupeApprenant $groupeApprenant): self
    {
        if ($this->groupeApprenants->removeElement($groupeApprenant)) {
            $groupeApprenant->removeFormateur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Promo[]
     */
    public function getPromos(): Collection
    {
        return $this->promos;
    }

    public function addPromo(Promo $promo): self
    {
        if (!$this->promos->contains($promo)) {
            $this->promos[] = $promo;
            $promo->addFormateur($this);
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->promos->removeElement($promo)) {
            $promo->removeFormateur($this);
        }

        return $this;
    }
}
