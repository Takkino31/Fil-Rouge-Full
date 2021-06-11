<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use App\Datapersister\ProfilDataPersister;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 * @ApiFilter(BooleanFilter::class, properties={"isDrop"})
 * @UniqueEntity("libelle");
 * @ApiResource(
 *     normalizationContext={"groups"={"profil:read","profil_users:read"}},
 *     routePrefix="/admin",
 *     attributes={
 *          "security"="is_granted('ROLE_ADMIN')",
 *          "security_message"= "Vous n'avez pas acces à cette ressource"
 *     },
 *     collectionOperations={
 *          "get_profils"={
 *              "method"="GET",
 *              "path"="/profils",
 *              "normalizationContext"={"groups"={"read_all"}},
 *          },
 *          "add_profil"={
 *              "method"="POST",
 *              "path"="/profils",
 *          }
 *       },
 *      itemOperations={
 *          "get_profil"={
 *              "method"="GET",
 *              "path"="/profils/{id}",
 *               
 *          },
 *          "put_profil"={
 *              "method"="PUT",
 *              "path"="/profils/{id}",
 *          },
 *          "delete_profil"={
 *              "method"="DELETE",
 *              "path"="/profils/{id}",
 *          }
 *       })
 */
class Profil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read_all","profil:read","profil_users:read","read:user_only"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read_all","profil:read","profil_users:read","read:user_only","read:users"})
     * @Assert\NotBlank(message="Le champ libellé est vide")
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDrop = false;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="profil")
     * @ApiSubresource()
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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
        $this->libelle = strtoupper($libelle);

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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setProfil($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getProfil() === $this) {
                $user->setProfil(null);
            }
        }

        return $this;
    }
}
