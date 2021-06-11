<?php

namespace App\Entity;

use App\Entity\Referentiel;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReferentielRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ReferentielRepository::class)
 * @UniqueEntity( fields={"libelle"}, message="Ce libellé existe déjà pour un autre réferentiel .")
 * @ApiFilter(BooleanFilter::class, properties={"isDrop"})
 * @ApiResource(
 *      routePrefix="/admin",
 *      attributes={ "security_message"= "Vous n'avez pas accès à cette ressource",
 *                   "security"="is_granted('ROLE_FORMATEUR')",
 *                   "pagination_items_per_page"=500
 *                  },
 *      collectionOperations={
 *          "get_referentiels"={
 *              "method"="GET",
 *              "path"="/referentiels",
 *              "normalization_context"={"groups"={"read:referentiels"}},
 *              },
 *  *          "get_grpskills_referentiels"={
 *              "method"="GET",
 *              "path"="/referentiels/groupecompetences",
 *              "normalization_context"={"groups"={"read:referentiels_grp_skills"}},
 *              },
 *          "add_referentiels"={
 *              "method"="POST",
 *              "path"="/referentiels",
 *              "normalization_context"={"groups"={"create:referentiel"}},
 *              },
 *      },
 *      itemOperations={
 *          "get_referentiel"={
 *              "method"="GET",
 *              "path"="/referentiels/{id}",
 *              "normalization_context"={"groups"={"read:referentiel_only"}},
 *              },
 *          "get_referentiel_grp_skills_only"={
 *              "method"="GET",
 *              "path"="/referentiels/{id_ref}/groupecompetences/{id_grp_skills}",
 *              "normalization_context"={"groups"={"read:referentiel_skills_only"}}
 *              },
 *          "put_referentiels"={
 *              "method"="PUT",
 *              "path"="/referentiels/{id}",
 *              "denormalization_context"={"groups"={"update:referentiel"}},
 *              },
 *          "delete_referentiel"={
 *              "method"="DELETE",
 *              "path"="/referentiels/{id}"
 *              },
 *      }
 * )
 */

class Referentiel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:referentiels","read:referentiel_only"})
     * @Groups({"create:referentiel"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:referentiels","read:referentiel_only"})
     * @Groups({"create:referentiel","update:referentiel"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Groups({"read:referentiels","read:referentiel_only"})
     * @Groups({"create:referentiel","update:referentiel"})
     */
    private $presentation;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups({"read:referentiels","read:referentiel_only"})
     * @Groups({"create:referentiel","update:referentiel"})
     */
    private $programme;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:referentiels","read:referentiel_only"})
     * @Groups({"create:referentiel","update:referentiel"})
     */
    private $critereEvaluation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:referentiels","read:referentiel_only"})
     * @Groups({"create:referentiel","update:referentiel"})
     */
    private $critereAdmission;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:referentiels","read:referentiels_grp_skills"})
     */
    private $isDrop=false;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeCompetence::class, inversedBy="referentiels")
     * @Groups({"read:referentiels","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only"})
     * @Groups({"create:referentiel","update:referentiel"})
     */
    private $groupeCompetences;

    /**
     * @ORM\OneToMany(targetEntity=Promo::class, mappedBy="referentiel")
     */
    private $promos;

    public function __construct()
    {
        $this->groupeCompetences = new ArrayCollection();
        $this->promos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getProgramme()
    {
        if ($this->programme) {
            $file= \stream_get_contents($this->programme);
            return base64_encode($file);
        }
        return null;
    }

    public function setProgramme($programme): self
    {
        $this->programme = $programme;

        return $this;
    }

    public function getCritereEvaluation(): ?string
    {
        return $this->critereEvaluation;
    }

    public function setCritereEvaluation(string $critereEvaluation): self
    {
        $this->critereEvaluation = $critereEvaluation;

        return $this;
    }

    public function getCritereAdmission(): ?string
    {
        return $this->critereAdmission;
    }

    public function setCritereAdmission(string $critereAdmission): self
    {
        $this->critereAdmission = $critereAdmission;

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

    /**
     * @return Collection|GroupeCompetence[]
     */
    public function getGroupeCompetences(): Collection
    {
        return $this->groupeCompetences;
    }

    public function addGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        if (!$this->groupeCompetences->contains($groupeCompetence)) {
            $this->groupeCompetences[] = $groupeCompetence;
        }

        return $this;
    }

    public function removeGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        $this->groupeCompetences->removeElement($groupeCompetence);

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
            $promo->setReferentiel($this);
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->promos->removeElement($promo)) {
            // set the owning side to null (unless already changed)
            if ($promo->getReferentiel() === $this) {
                $promo->setReferentiel(null);
            }
        }

        return $this;
    }

}
