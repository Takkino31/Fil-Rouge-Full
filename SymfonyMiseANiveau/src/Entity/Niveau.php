<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NiveauRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
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
     * @Assert\NotBlank(message = " le champ libellé du niveau est nul !")
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     * @Groups({"create:_skills","update:_skill_only","create:groupes_skills","update:groupes_skills"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = " le champ critereEvaluation du niveau est nul !")
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     * @Groups({"create:_skills","update:_skill_only","create:groupes_skills","update:groupes_skills"})
     */
    private $critereEvaluation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = " le champ groupeAction du niveau est nul !")
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     * @Groups({"create:_skills","update:_skill_only","create:groupes_skills","update:groupes_skills"})
     */
    private $groupeAction;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:_skills","read:_skill_only","read:groupes_skills","read:skill_groupes_skills","read:skill_groupes_skills","read:referentiels_grp_skills","read:referentiel_only","read:referentiel_skills_only","read:skill_of_grp_skills"})
     */
    private $isDrop=false;

    /**
     * @ORM\ManyToOne(targetEntity=Competence::class, inversedBy="niveaux")
     * @ApiSubresource()
     */
    private $competence;

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

    public function getCritereEvaluation(): ?string
    {
        return $this->critereEvaluation;
    }

    public function setCritereEvaluation(string $critereEvaluation): self
    {
        $this->critereEvaluation = $critereEvaluation;

        return $this;
    }

    public function getGroupeAction(): ?string
    {
        return $this->groupeAction;
    }

    public function setGroupeAction(string $groupeAction): self
    {
        $this->groupeAction = $groupeAction;

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

    public function getCompetence(): ?Competence
    {
        return $this->competence;
    }

    public function setCompetence(?Competence $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

}
