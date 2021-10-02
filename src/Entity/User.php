<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"email"},
 *     message="l'email que vous avez indique est déjà utilisé"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="votre mot de passe est doit etre minimun 8 caracteres")
     * @Assert\EqualTo(propertyPath="confirm_password", message="vous n'avez pas taper le meme mot de passe")
     */
    private $password;
    /**
     * @Assert\EqualTo(propertyPath="password", message="vous n'avez pas taper le meme mot de passe")
     */
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public $confirm_password;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":true})
     */
    private $IsValid;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $tokenToConfirmAccount;


    /**
     * @ORM\ManyToMany(targetEntity=Role::class, mappedBy="users")
     */
    private $userRoles;

    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getname(): ?string
    {
        return $this->name;
    }

    public function setname(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }
    public function getRoles()
    {

        $roles = $this->userRoles->map(function ($role){
            return $role->getName();
        })->toArray();

        $roles[] = 'ROLE_USER';


        return $roles;
    }

    public function getIsValid(): ?bool
    {
        return $this->IsValid;
    }

    public function setIsValid(?bool $IsValid): self
    {
        $this->IsValid = $IsValid;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getTokenToConfirmAccount()
    {
        return $this->tokenToConfirmAccount;
    }

    /**
     * @param mixed $tokenToConfirmAccount
     * @return User
     */
    public function setTokenToConfirmAccount($tokenToConfirmAccount)
    {
        $this->tokenToConfirmAccount = $tokenToConfirmAccount;
        return $this;
    }


    /**
     * @return Collection|Role[]
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(Role $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
            $userRole->addUser($this);
        }

        return $this;
    }

    public function removeUserRole(Role $userRole): self
    {
        if ($this->userRoles->removeElement($userRole)) {
            $userRole->removeUser($this);
        }

        return $this;
    }
}
