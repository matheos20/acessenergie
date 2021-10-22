<?php

namespace App\Entity;

use App\Repository\ElectriciteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ElectriciteRepository::class)
 */
class Electricite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL1;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL2;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL3;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL4;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL5;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL6;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL7;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL8;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL9;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL10;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL11;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL12;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL13;

    /**
     *
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL14;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL15;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL16;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL17;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL18;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL19;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PDL20;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAlreadyAuthorized;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="electricite",cascade={"remove"})
     */
    private $client;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $tokenToConfirmAuthorization;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $horodatage;

    public function __construct()
    {
        $this->client = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPDL1(): ?string
    {
        return $this->PDL1;
    }

    public function setPDL1(string $PDL1): self
    {
        $this->PDL1 = $PDL1;

        return $this;
    }

    public function getPDL2(): ?string
    {
        return $this->PDL2;
    }

    public function setPDL2(string $PDL2): self
    {
        $this->PDL2 = $PDL2;

        return $this;
    }

    public function getPDL3(): ?string
    {
        return $this->PDL3;
    }

    public function setPDL3(string $PDL3): self
    {
        $this->PDL3 = $PDL3;

        return $this;
    }

    public function getPDL4(): ?string
    {
        return $this->PDL4;
    }

    public function setPDL4(string $PDL4): self
    {
        $this->PDL4 = $PDL4;

        return $this;
    }

    public function getPDL5(): ?string
    {
        return $this->PDL5;
    }

    public function setPDL5(string $PDL5): self
    {
        $this->PDL5 = $PDL5;

        return $this;
    }

    public function getPDL6(): ?string
    {
        return $this->PDL6;
    }

    public function setPDL6(string $PDL6): self
    {
        $this->PDL6 = $PDL6;

        return $this;
    }

    public function getPDL7(): ?string
    {
        return $this->PDL7;
    }

    public function setPDL7(string $PDL7): self
    {
        $this->PDL7 = $PDL7;

        return $this;
    }

    public function getPDL8(): ?string
    {
        return $this->PDL8;
    }

    public function setPDL8(string $PDL8): self
    {
        $this->PDL8 = $PDL8;

        return $this;
    }

    public function getPDL9(): ?string
    {
        return $this->PDL9;
    }

    public function setPDL9(string $PDL9): self
    {
        $this->PDL9 = $PDL9;

        return $this;
    }

    public function getPDL10(): ?string
    {
        return $this->PDL10;
    }

    public function setPDL10(string $PDL10): self
    {
        $this->PDL10 = $PDL10;

        return $this;
    }

    public function getPDL11(): ?string
    {
        return $this->PDL11;
    }

    public function setPDL11(string $PDL11): self
    {
        $this->PDL11 = $PDL11;

        return $this;
    }

    public function getPDL12(): ?string
    {
        return $this->PDL12;
    }

    public function setPDL12(string $PDL12): self
    {
        $this->PDL12 = $PDL12;

        return $this;
    }

    public function getPDL13(): ?string
    {
        return $this->PDL13;
    }

    public function setPDL13(string $PDL13): self
    {
        $this->PDL13 = $PDL13;

        return $this;
    }

    public function getPDL14(): ?string
    {
        return $this->PDL14;
    }

    public function setPDL14(string $PDL14): self
    {
        $this->PDL14 = $PDL14;

        return $this;
    }

    public function getPDL15(): ?string
    {
        return $this->PDL15;
    }

    public function setPDL15(string $PDL15): self
    {
        $this->PDL15 = $PDL15;

        return $this;
    }

    public function getPDL16(): ?string
    {
        return $this->PDL16;
    }

    public function setPDL16(string $PDL16): self
    {
        $this->PDL16 = $PDL16;

        return $this;
    }

    public function getPDL17(): ?string
    {
        return $this->PDL17;
    }

    public function setPDL17(string $PDL17): self
    {
        $this->PDL17 = $PDL17;

        return $this;
    }

    public function getPDL18(): ?string
    {
        return $this->PDL18;
    }

    public function setPDL18(string $PDL18): self
    {
        $this->PDL18 = $PDL18;

        return $this;
    }

    public function getPDL19(): ?string
    {
        return $this->PDL19;
    }

    public function setPDL19(string $PDL19): self
    {
        $this->PDL19 = $PDL19;

        return $this;
    }

    public function getPDL20(): ?string
    {
        return $this->PDL20;
    }

    public function setPDL20(string $PDL20): self
    {
        $this->PDL20 = $PDL20;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsAlreadyAuthorized()
    {
        return $this->isAlreadyAuthorized;
    }

    /**
     * @param mixed $isAlreadyAuthorized
     * @return Electricite
     */
    public function setIsAlreadyAuthorized($isAlreadyAuthorized)
    {
        $this->isAlreadyAuthorized = $isAlreadyAuthorized;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTokenToConfirmAuthorization()
    {
        return $this->tokenToConfirmAuthorization;
    }

    /**
     * @param mixed $tokenToConfirmAuthorization
     * @return Electricite
     */
    public function setTokenToConfirmAuthorization($tokenToConfirmAuthorization)
    {
        $this->tokenToConfirmAuthorization = $tokenToConfirmAuthorization;
        return $this;
    }

    public function getHorodatage(): ?\DateTimeInterface
    {
        return $this->horodatage;
    }

    public function setHorodatage(\DateTimeInterface $horodatage): self
    {
        $this->horodatage = $horodatage;

        return $this;
    }


}
