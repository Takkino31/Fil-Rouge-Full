<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeTagRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=GroupeTagRepository::class)
 * @ApiFilter(BooleanFilter::class, properties={"isDrop"})
 * @UniqueEntity( fields={"libelle"},   message="Ce libellé existe déjà pour un autre groupe de tag.")
 * @ApiResource(
 * routePrefix="/admin",
 *         attributes={ 
 *              "security"="is_granted('ROLE_FORMATEUR')",
 *              "security_message"= "Vous n'avez pas accès à cette ressource"
 *          },
 *         collectionOperations={
 *                     "get_grp_tags"={
 *                         "method"="GET",
 *                         "path"="/grptags",
 *                         "normalization_context"={"groups"={"read:_grptags"}},
 *                     }, 
 *                      "add_grp_tags"={
 *                         "method"="POST",
 *                         "path"="/grptags",
 *                         "denormalization_context"={"groups"={"create:_grptags"}}
 *                     }
 *          },
 *         itemOperations={
 *                     "get_grptag"={
 *                         "method"="GET",
 *                         "path"="/grptags/{id}",
 *                         "denormalization_context"={"groups"={"read:_grptag"}}
 *                     },
 *                     "put_grptag"={
 *                         "method"="PUT",
 *                         "path"="/grptags/{id}",
 *                         "denormalization_context"={"groups"={"update:_grptag"}}
 *                     },
 *                     "delete_grptag"={
 *                         "method"="DELETE",
 *                         "path"="/grptags/{id}"
 *                     },
 *          }
 * )
 */
class GroupeTag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:_grptags","read:_grptag"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "le champ libellé du groupe de tag est nul !")
     * @Groups({"read:_grptags","read:_grptag"})
     * @Groups({"create:_grptags","update:_grptag"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:_grptags","read:_grptag","update:_grptag"})
     */
    private $isDrop=false;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="groupeTags", cascade={"persist"})
     * @Groups({"read:_grptags","read:_grptag"})
     * @Groups({"create:_grptags","update:_grptag"})
     * @Assert\Count(
     *      min = 1,
     *      minMessage = "Vous devez ajouter ou affecter au moins un tag",
     * )
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
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

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tags->removeElement($tag);

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
