<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $social_reason;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mermaid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_of_signatory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $function;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity=Gaz::class, mappedBy="client")
     */
    private $gaz;

    /**
     * @ORM\OneToMany(targetEntity=Electricite::class, mappedBy="client")
     */
    private $electricite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valider;

    /**
     * @ORM\OneToMany(targetEntity=ElectricitePlus20::class, mappedBy="client")
     */
    private $electricitePlus20s;

    /**
     * @ORM\OneToMany(targetEntity=GazPlus20::class, mappedBy="client")
     */
    private $gazPlus20s;

    /**
     * @ORM\Column(type="integer")
     */
    private $PostalCode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $city;

    /**
     * @ORM\Column(type="string")
     */
    private $telephone;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $horodatage;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="vendeur")
     */
    private $user;

    public function __construct()
    {
        $this->gaz = new ArrayCollection();
        $this->electricite = new ArrayCollection();
        $this->electricitePlus20s = new ArrayCollection();
        $this->gazPlus20s = new ArrayCollection();
        $this->vendeur = new ArrayCollection();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSocialReason(): ?string
    {
        return $this->social_reason;
    }

    public function setSocialReason(string $social_reason): self
    {
        $this->social_reason = $social_reason;

        return $this;
    }

    public function getmermaid(): ?string
    {
        return $this->mermaid;
    }

    public function setmermaid(string $mermaid): self
    {
        $this->mermaid = $mermaid;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getNameOfSignatory(): ?string
    {
        return $this->name_of_signatory;
    }

    public function setNameOfSignatory(string $name_of_signatory): self
    {
        $this->name_of_signatory = $name_of_signatory;

        return $this;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function setFunction(string $function): self
    {
        $this->function = $function;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection|Gaz[]
     */
    public function getGaz(): Collection
    {
        return $this->gaz;
    }

    public function addGaz(Gaz $gaz): self
    {
        if (!$this->gaz->contains($gaz)) {
            $this->gaz[] = $gaz;
            $gaz->setClient($this);
        }

        return $this;
    }

    public function removeGaz(Gaz $gaz): self
    {
        if ($this->gaz->removeElement($gaz)) {
            // set the owning side to null (unless already changed)
            if ($gaz->getClient() === $this) {
                $gaz->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Electricite[]
     */
    public function getElectricite(): Collection
    {
        return $this->electricite;
    }

    public function addElectricite(Electricite $electricite): self
    {
        if (!$this->electricite->contains($electricite)) {
            $this->electricite[] = $electricite;
            $electricite->setClient($this);
        }

        return $this;
    }

    public function removeElectricite(Electricite $electricite): self
    {
        if ($this->electricite->removeElement($electricite)) {
            // set the owning side to null (unless already changed)
            if ($electricite->getClient() === $this) {
                $electricite->setClient(null);
            }
        }

        return $this;
    }

    public function getValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(?bool $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    /**
     * @return Collection|ElectricitePlus20[]
     */
    public function getElectricitePlus20s(): Collection
    {
        return $this->electricitePlus20s;
    }

    public function addElectricitePlus20(ElectricitePlus20 $electricitePlus20): self
    {
        if (!$this->electricitePlus20s->contains($electricitePlus20)) {
            $this->electricitePlus20s[] = $electricitePlus20;
            $electricitePlus20->setClient($this);
        }

        return $this;
    }

    public function removeElectricitePlus20(ElectricitePlus20 $electricitePlus20): self
    {
        if ($this->electricitePlus20s->removeElement($electricitePlus20)) {
            // set the owning side to null (unless already changed)
            if ($electricitePlus20->getClient() === $this) {
                $electricitePlus20->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|GazPlus20[]
     */
    public function getGazPlus20s(): Collection
    {
        return $this->gazPlus20s;
    }

    public function addGazPlus20(GazPlus20 $gazPlus20): self
    {
        if (!$this->gazPlus20s->contains($gazPlus20)) {
            $this->gazPlus20s[] = $gazPlus20;
            $gazPlus20->setClient($this);
        }

        return $this;
    }

    public function removeGazPlus20(GazPlus20 $gazPlus20): self
    {
        if ($this->gazPlus20s->removeElement($gazPlus20)) {
            // set the owning side to null (unless already changed)
            if ($gazPlus20->getClient() === $this) {
                $gazPlus20->setClient(null);
            }
        }

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->PostalCode;
    }

    public function setPostalCode(int $PostalCode): self
    {
        $this->PostalCode = $PostalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getHorodatage(): ?\DateTimeInterface
    {
        return $this->horodatage;
    }

    public function setHorodatage(?\DateTimeInterface $horodatage): self
    {
        $this->horodatage = $horodatage;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
