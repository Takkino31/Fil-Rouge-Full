<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeCompetenceRepository;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=GroupeCompetenceRepository::class)
 * @UniqueEntity( fields={"libelle"},   message="Ce libellé existe déjà pour une autre compétence.")
 * @ApiFilter(BooleanFilter::class, properties={"isDrop"})
 * @ApiResource(
 *     routePrefix="/admin",
 *     attributes={ 
 *          "security_message"= "Vous n'avez pas accès à cette ressource",
 *          "pagination_items_per_page"=500
 * },
 *      collectionOperations={
 *          "get_groupes_skills"={
 *              "method"="GET",
 *              "path"="/groupecompetences",
 *              "normalization_context"={"groups"={"read:groupes_skills"}},
 *              "security"="is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"
 *              },
 *          "get_skill_groupes_skills"={
 *              "method"="GET",
 *              "path"="/groupecompetences/competences",
 *              "normalization_context"={"groups"={"read:skill_groupes_skills"}},
 *              "security"="is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"
 *              },
 *           "post_groupes_skills"={
 *              "method"="POST",
 *              "path"="/groupecompetences",
 *              "normalization_context"={"groups"={"create:groupes_skills"}},
 *              "security"="is_granted('ROLE_ADMIN')"
 *              }
 *      },
 *      itemOperations={
 *          "get_groupes_skills"={
 *              "method"="GET",
 *              "path"="/groupecompetences/{id}",
 *              "normalization_context"={"groups"={"read:skill_of_grp_skills"}},
 *              "security"="is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"
 *              }, 
 *          "put_groupes_skills"={
 *              "method"="PUT",
 *              "path"="/groupecompetences/{id}",
 *              "denormalization_context"={"groups"={"update:groupes_skills"}},
 *              "security"="is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"
 *              },  
 *          "delete_groupes_skills"={
 *              "method"="DELETE",
 *              "path"="/groupecompetences/{id}",
 *              "security"="is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"
 *              },     
 *      }
 * )
 */
class GroupeCompetence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiels","read:referentiel_only","read:skill_of_grp_skills","read:_skill_only"})
     * @Groups({"create:groupes_skills","update:groupes_skills"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "le champ libellé du groupe de compétence est nul")
     * @Groups({"read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiels","read:referentiel_only","read:skill_of_grp_skills","read:_skill_only"})
     * @Groups({"create:groupes_skills","update:groupes_skills"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "le champ descriptif du groupe de compétence est nul")
     * @Groups({"read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiels","read:referentiel_only","read:skill_of_grp_skills"})
     * @Groups({"create:groupes_skills","update:groupes_skills"})
     */
    private $descriptif;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiels","read:referentiel_only","read:skill_of_grp_skills"})
     */
    private $isDrop=false;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, inversedBy="groupeCompetences", cascade={"persist"})
     * @ApiSubresource()
     * @Assert\Count(
     *      min = 1,
     *      minMessage = "Vous devez ajouter au minimum une compétence pour un groupe de compétence !"
     * )
     * @Groups({"read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiels","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     * @Groups({"create:groupes_skills","update:groupes_skills"})
     */
    private $competences;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="groupeCompetences")
     */
    private $referentiels;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
        $this->referentiels = new ArrayCollection();
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

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

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
     * @return Collection|Competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    /**
     * @return Collection|Referentiel[]
     */
    public function getReferentiels(): Collection
    {
        return $this->referentiels;
    }

    public function addReferentiel(Referentiel $referentiel): self
    {
        if (!$this->referentiels->contains($referentiel)) {
            $this->referentiels[] = $referentiel;
            $referentiel->addGroupeCompetence($this);
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->removeElement($referentiel)) {
            $referentiel->removeGroupeCompetence($this);
        }

        return $this;
    }
}
