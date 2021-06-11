<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
* @ORM\Entity(repositoryClass=UserRepository::class)
* @UniqueEntity({"username","email"})
* @ORM\InheritanceType("JOINED")
* @ORM\DiscriminatorColumn(name="type", type="string")
* @ORM\DiscriminatorMap({"user" = "User","admin" = "Admin", "formateur" = "Formateur", "cm" = "Cm", "apprenant"="Apprenant"})
* @ApiFilter(BooleanFilter::class, properties={"isDrop"})
* @ApiFilter(SearchFilter::class, properties={"profil.libelle"})
* @ApiResource(
*     attributes={
*          "security"="is_granted('ROLE_ADMIN')",
*          "security_message"= "Vous n'avez pas accès à cette ressource",
*          "pagination_items_per_page"= 8
*     },
*     collectionOperations={
*          "get_users"={
*              "method"="GET",
*              "path"="admin/users",
*              "normalization_context"={"groups"={"read:users"}},
*           },
*           "add_users"={
*               "method"="POST",
*               "path"="admin/users",
*               "route_name"="add_user"
*           },
*           "get_users_nbr"={
*              "method"="GET",
*              "path"="admin/nbrusers"
*           },
*       },
*     itemOperations={
*          "get_user"={
*              "method"="GET",
*              "path"="admin/users/{id}",
*              "normalization_context"={"groups"={"read:user_only"}},
*           },
*          "put_user"={
*              "method"="PUT",
*              "path"="admin/users/{id}"
*           },
*          "delete_user"={
*              "method"="DELETE",
*              "path"="admin/users/{id}"
*           },
*       }
*)
*/
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:users","read:user_only","read:_students","read:_formateurs","read:_student","read:_formateur","read:_groupesApprenants","read:_grpAppApprenants"})
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"read:users","read:user_only","read:_students","read:_formateurs","read:_student","read:_formateur","read:_groupesApprenants","read:_grpAppApprenants"})
     */
    protected $username;

     protected $roles = [];

    /**
     * @var string The hashed password
     * @Groups({"read:user_only"})
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:users","read:user_only","read:_students","read:_formateurs","read:_student","read:_formateur","read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     * @Assert\NotBlank(message = "le champ nom est nul")
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:users","read:user_only","read:_students","read:_formateurs","read:_student","read:_formateur","read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     * @Assert\NotBlank(message = "le champ prenom est nul")
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:users","read:user_only","read:_students","read:_formateurs","read:_student","read:_formateur","read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     * @Assert\NotBlank(message = "le champ email est nul")
     * @Assert\Email
     */
    protected $email;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:users","read:user_only","read:_students","read:_formateurs","read:_student","read:_formateur","read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     */
    protected $isDrop = false;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="users")
     * @Groups({"read:user_only","read:users"})
     */
    private $profil;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups({"read:users","read:user_only","read:_students","read:_formateurs","read:_student","read:_formateur","read:_groupesApprenants","read:_grpAppApprenants","read:_groupesApprenants_id"})
     */
    protected $avatar;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_'.strtoupper(($this->profil->getLibelle()));

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getAvatar()
    {
        if ($this->avatar) {
            $image= \stream_get_contents($this->avatar);
            return base64_encode($image);
        }
        return null;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}
