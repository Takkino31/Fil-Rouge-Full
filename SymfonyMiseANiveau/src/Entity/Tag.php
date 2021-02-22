<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 * @ApiFilter(BooleanFilter::class, properties={"isDrop"})
 * @UniqueEntity( fields={"descriptif"},   message="Ce descriptif existe déjà pour un autre tag.")
 * @ApiResource(
 *         routePrefix="/admin",
 *         attributes={ 
 *              "security"="is_granted('ROLE_FORMATEUR')",
 *              "security_message"= "Vous n'avez pas accès à cette ressource"
 *          },
 *         collectionOperations={
 *                     "get_tags"={
 *                         "method"="GET",
 *                         "path"="/tags",
 *                         "normalization_context"={"groups"={"read:_tags"}},
 *                     }, 
 *                      "add_tags"={
 *                         "method"="POST",
 *                         "path"="/tags",
 *                         "denormalization_context"={"groups"={"create:_tags"}}
 *                     }
 *          },
 *         itemOperations={
 *                     "get_tag"={
 *                         "method"="GET",
 *                         "path"="/tags/{id}",
 *                         "normalization_context"={"groups"={"read:_tag"}}
 *                     },
 *                     "put_tag"={
 *                         "method"="PUT",
 *                         "path"="/tags/{id}",
 *                         "denormalization_context"={"groups"={"update:_tag"}}
 *                     },
 *                     "delete_tag"={
 *                         "method"="DELETE",
 *                         "path"="/tags/{id}"
 *                     },
 *          }
 * )
 */

class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:_tags","read:_tag","read:_grptags","read:_grptag"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "le champ descriptif du groupe de tag est nul !")
     * @Groups({"read:_tags","read:_tag","create:_tag","read:_grptags","read:_grptag"})
     * @Groups({"create:_tags","update:_tag","delete:_tag","create:_grptags","update:_grptag","delete:_grptag"})
     */
    private $descriptif;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:_tags","read:_tag","read:_grptags","read:_grptag","update:_grptag"})
     */
    private $isDrop=false;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeTag::class, mappedBy="tags")
     */
    private $groupeTags;

    public function __construct()
    {
        $this->groupeTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|GroupeTag[]
     */
    public function getGroupeTags(): Collection
    {
        return $this->groupeTags;
    }

    public function addGroupeTag(GroupeTag $groupeTag): self
    {
        if (!$this->groupeTags->contains($groupeTag)) {
            $this->groupeTags[] = $groupeTag;
            $groupeTag->addTag($this);
        }

        return $this;
    }

    public function removeGroupeTag(GroupeTag $groupeTag): self
    {
        if ($this->groupeTags->removeElement($groupeTag)) {
            $groupeTag->removeTag($this);
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
}
