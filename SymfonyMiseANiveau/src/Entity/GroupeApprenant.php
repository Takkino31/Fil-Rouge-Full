<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeApprenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GroupeApprenantRepository::class)
 * @ApiResource(
 *     routePrefix="/admin",
 *      attributes={
 *          "security"="is_granted('ROLE_ADMIN')",
 *          "security_message"= "Vous n'avez pas accès à cette ressource"
 *     },
 *     collectionOperations={
 *           "get_groupes"={
 *              "method"="GET",
 *              "path"= "/groupes",
 *              "normalization_context"={"groups"={"read:_groupesApprenants"}}
 *           },
 *           "get_groupes_apprenants"={
 *              "method"="GET",
 *              "path"= "/groupes/apprenants",
 *              "normalization_context"={"groups"={"read:_grpAppApprenants"}}
 *           },
 *           "post_grp_app"={
 *              "method"="POST",
 *              "path"="/groupes",
 *              "route_name"="post_grp_app"
 *             },
 *      },
 *     itemOperations={
 *           "get_grp_id"={
 *              "method"="GET",
 *              "path"="/groupes/{id}",
 *              "normalization_context"={"groups"={"read:_groupesApprenants_id"}}
 *             },
 *           "delete_grp_id"={
 *              "method"="DELETE",
 *              "path"="/groupes/{id}"
 *             }
 *       }
 *  )
 */
class GroupeApprenant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     */
    private $nom;

    /**
     * @ORM\Column(type="date" , nullable=false)
     * @Groups({"read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     */
    private $dateCreation;

    /**
     * @ORM\ManyToMany(targetEntity=Formateur::class, inversedBy="groupeApprenants")
     * @Groups({"read:_groupesApprenants","read:_groupesApprenants_id"})
     */
    private $formateurs;

    /**
     * @ORM\ManyToMany(targetEntity=Apprenant::class, inversedBy="groupeApprenants")
     * @Groups({"read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     * @Groups({"put:_groupesApprenants_id"})
     */
    private $Apprenants;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:_groupesApprenants"})
     */
    private $isDrop=false;

    /**
     * @ORM\ManyToOne(targetEntity=Promo::class, inversedBy="groupeApprenants")
     */
    private $promo;

    public function __construct()
    {
        $this->formateurs = new ArrayCollection();
        $this->Apprenants = new ArrayCollection();
        $this->dateCreation = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation( $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return Collection|Formateur[]
     */
    public function getFormateurs(): Collection
    {
        return $this->formateurs;
    }

    public function addFormateur(Formateur $formateur): self
    {
        if (!$this->formateurs->contains($formateur)) {
            $this->formateurs[] = $formateur;
        }

        return $this;
    }

    public function removeFormateur(Formateur $formateur): self
    {
        $this->formateurs->removeElement($formateur);

        return $this;
    }

    /**
     * @return Collection|Apprenant[]
     */
    public function getApprenants(): Collection
    {
        return $this->Apprenants;
    }

    public function addApprenant(Apprenant $apprenant): self
    {
        if (!$this->Apprenants->contains($apprenant)) {
            $this->Apprenants[] = $apprenant;
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        $this->Apprenants->removeElement($apprenant);

        return $this;
    }

    public function getIsDrop(): ?bool
    {
        return $this->isDrop;
    }

    public function setIsDrop(bool $isDrop): self
    {
        $this->isDrop = $isDrop;

        return $this;
    }

    public function getPromo(): ?Promo
    {
        return $this->promo;
    }

    public function setPromo(?Promo $promo): self
    {
        $this->promo = $promo;

        return $this;
    }
}
