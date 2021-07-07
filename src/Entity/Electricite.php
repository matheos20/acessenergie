<?php

namespace App\Entity;

use App\Repository\ElectriciteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ElectriciteRepository::class)
 */
class Electricite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL4;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL5;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL6;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL7;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL8;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL9;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL10;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL11;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL12;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL13;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL14;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL15;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL16;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL17;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL18;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL19;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PDL20;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="electricite")
     */
    private $client;

    public function __construct()
    {
        $this->client = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPDL1(): ?int
    {
        return $this->PDL1;
    }

    public function setPDL1(?int $PDL1): self
    {
        $this->PDL1 = $PDL1;

        return $this;
    }

    public function getPDL2(): ?int
    {
        return $this->PDL2;
    }

    public function setPDL2(?int $PDL2): self
    {
        $this->PDL2 = $PDL2;

        return $this;
    }

    public function getPDL3(): ?int
    {
        return $this->PDL3;
    }

    public function setPDL3(?int $PDL3): self
    {
        $this->PDL3 = $PDL3;

        return $this;
    }

    public function getPDL4(): ?int
    {
        return $this->PDL4;
    }

    public function setPDL4(?int $PDL4): self
    {
        $this->PDL4 = $PDL4;

        return $this;
    }

    public function getPDL5(): ?int
    {
        return $this->PDL5;
    }

    public function setPDL5(?int $PDL5): self
    {
        $this->PDL5 = $PDL5;

        return $this;
    }

    public function getPDL6(): ?int
    {
        return $this->PDL6;
    }

    public function setPDL6(?int $PDL6): self
    {
        $this->PDL6 = $PDL6;

        return $this;
    }

    public function getPDL7(): ?int
    {
        return $this->PDL7;
    }

    public function setPDL7(?int $PDL7): self
    {
        $this->PDL7 = $PDL7;

        return $this;
    }

    public function getPDL8(): ?int
    {
        return $this->PDL8;
    }

    public function setPDL8(?int $PDL8): self
    {
        $this->PDL8 = $PDL8;

        return $this;
    }

    public function getPDL9(): ?int
    {
        return $this->PDL9;
    }

    public function setPDL9(?int $PDL9): self
    {
        $this->PDL9 = $PDL9;

        return $this;
    }

    public function getPDL10(): ?int
    {
        return $this->PDL10;
    }

    public function setPDL10(?int $PDL10): self
    {
        $this->PDL10 = $PDL10;

        return $this;
    }

    public function getPDL11(): ?int
    {
        return $this->PDL11;
    }

    public function setPDL11(?int $PDL11): self
    {
        $this->PDL11 = $PDL11;

        return $this;
    }

    public function getPDL12(): ?int
    {
        return $this->PDL12;
    }

    public function setPDL12(?int $PDL12): self
    {
        $this->PDL12 = $PDL12;

        return $this;
    }

    public function getPDL13(): ?int
    {
        return $this->PDL13;
    }

    public function setPDL13(?int $PDL13): self
    {
        $this->PDL13 = $PDL13;

        return $this;
    }

    public function getPDL14(): ?int
    {
        return $this->PDL14;
    }

    public function setPDL14(?int $PDL14): self
    {
        $this->PDL14 = $PDL14;

        return $this;
    }

    public function getPDL15(): ?int
    {
        return $this->PDL15;
    }

    public function setPDL15(?int $PDL15): self
    {
        $this->PDL15 = $PDL15;

        return $this;
    }

    public function getPDL16(): ?int
    {
        return $this->PDL16;
    }

    public function setPDL16(?int $PDL16): self
    {
        $this->PDL16 = $PDL16;

        return $this;
    }

    public function getPDL17(): ?int
    {
        return $this->PDL17;
    }

    public function setPDL17(?int $PDL17): self
    {
        $this->PDL17 = $PDL17;

        return $this;
    }

    public function getPDL18(): ?int
    {
        return $this->PDL18;
    }

    public function setPDL18(?int $PDL18): self
    {
        $this->PDL18 = $PDL18;

        return $this;
    }

    public function getPDL19(): ?int
    {
        return $this->PDL19;
    }

    public function setPDL19(?int $PDL19): self
    {
        $this->PDL19 = $PDL19;

        return $this;
    }

    public function getPDL20(): ?int
    {
        return $this->PDL20;
    }

    public function setPDL20(?int $PDL20): self
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

}
