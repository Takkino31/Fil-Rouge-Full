<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetenceRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 * @ApiFilter(BooleanFilter::class, properties={"isDrop"})
 * @UniqueEntity( fields={"libelle"},   message="Ce libellé existe déjà pour une autre compétence.")
 * @ApiResource(
 *     routePrefix="/admin",
 *     attributes={ "security_message"= "Vous n'avez pas accès à cette ressource",
 *                  "pagination_items_per_page"=500
 *                  },
 *      collectionOperations={
 *          "get_skills"={
 *              "method"="GET",
 *              "path"="/competences",
 *              "normalization_context"={"groups"={"read:_skills"}},
 *              "security"="is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"
 *          },
 *          "post_skills"={
 *              "method"="POST",
 *              "path"="/competences",
 *              "denormalization_context"={"groups"={"create:_skills"}},
 *              "security"="is_granted('ROLE_CM')"
 *          }
 *     },
 *      itemOperations={
 *          "get_skill"={
 *              "method"="GET",
 *              "path"="/competences/{id}",
 *              "normalization_context"={"groups"={"read:_skill_only"}},
 *              "security"="is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"
 *          },
 *          "put_skill"={
 *              "method"="PUT",
 *              "path"="/competences/{id}",
 *              "normalization_context"={"groups"={"update:_skill_only"}},
 *              "security"="is_granted('ROLE_ADMIN')"
 *          },
 *          "delete_skill"={
 *              "method"="DELETE",
 *              "path"="/competences/{id}",
 *              "security"="is_granted('ROLE_ADMIN')"
 *          }
 *      }
 * )
 */
class Competence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     * @Groups({"create:_skills","update:_skill_only","delete:_skill_only","create:groupes_skills","update:groupes_skills"})
     * @Assert\NotBlank(message = " le champ libellé de la compétence est nul !")
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     * @Groups({"create:_skills","update:_skill_only","delete:_skill_only","create:groupes_skills","update:groupes_skills"})
     * @Assert\NotBlank(message = " le champ descriptif de la compétence est nul !")
     */
    private $descriptif;

    /**
     * @ORM\OneToMany(targetEntity=Niveau::class, mappedBy="competence",cascade={"persist"})
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     * @Groups({"create:_skills","update:_skill_only","delete:_skill_only","create:groupes_skills","update:groupes_skills"})
     * @Assert\Count(
     *      min = 3,
     *      max = 3,
     *      minMessage = "Vous devez ajouter exactement 3 niveaux",
     *      maxMessage = "Vous devez ajouter exactement 3 niveaux"
     * )
     */
    private $niveaux;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     */
    private $isDrop=false;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeCompetence::class, mappedBy="competences")
     * @Groups({"read:_skill_only"})
     * @Groups({"create:_skills","update:_skill_only"})
     * @Assert\Count(
     *      min = 1,
     *      minMessage = "Vous devez lui affecter au moins un groupe de competences"
     * )
     */
    private $groupeCompetences;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
        $this->groupeCompetences = new ArrayCollection();
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

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
            $niveau->setCompetence($this);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveaux->removeElement($niveau)) {
            // set the owning side to null (unless already changed)
            if ($niveau->getCompetence() === $this) {
                $niveau->setCompetence(null);
            }
        }

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
            $groupeCompetence->addCompetence($this);
        }

        return $this;
    }

    public function removeGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        if ($this->groupeCompetences->removeElement($groupeCompetence)) {
            $groupeCompetence->removeCompetence($this);
        }

        return $this;
    }
}
