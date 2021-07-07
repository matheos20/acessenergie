<?php

namespace App\Entity;

use App\Repository\GazRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GazRepository::class)
 */
class Gaz
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
    private $PCE1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE4;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE5;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE6;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE7;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE8;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE9;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE10;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE11;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE12;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE13;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE14;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE15;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE16;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE17;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE18;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE19;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PCE20;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="gaz")
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

    public function getPCE1(): ?int
    {
        return $this->PCE1;
    }

    public function setPCE1(?int $PCE1): self
    {
        $this->PCE1 = $PCE1;

        return $this;
    }

    public function getPCE2(): ?int
    {
        return $this->PCE2;
    }

    public function setPCE2(?int $PCE2): self
    {
        $this->PCE2 = $PCE2;

        return $this;
    }

    public function getPCE3(): ?int
    {
        return $this->PCE3;
    }

    public function setPCE3(?int $PCE3): self
    {
        $this->PCE3 = $PCE3;

        return $this;
    }

    public function getPCE4(): ?int
    {
        return $this->PCE4;
    }

    public function setPCE4(?int $PCE4): self
    {
        $this->PCE4 = $PCE4;

        return $this;
    }

    public function getPCE5(): ?int
    {
        return $this->PCE5;
    }

    public function setPCE5(?int $PCE5): self
    {
        $this->PCE5 = $PCE5;

        return $this;
    }

    public function getPCE6(): ?int
    {
        return $this->PCE6;
    }

    public function setPCE6(?int $PCE6): self
    {
        $this->PCE6 = $PCE6;

        return $this;
    }

    public function getPCE7(): ?int
    {
        return $this->PCE7;
    }

    public function setPCE7(?int $PCE7): self
    {
        $this->PCE7 = $PCE7;

        return $this;
    }

    public function getPCE8(): ?int
    {
        return $this->PCE8;
    }

    public function setPCE8(?int $PCE8): self
    {
        $this->PCE8 = $PCE8;

        return $this;
    }

    public function getPCE9(): ?int
    {
        return $this->PCE9;
    }

    public function setPCE9(?int $PCE9): self
    {
        $this->PCE9 = $PCE9;

        return $this;
    }

    public function getPCE10(): ?int
    {
        return $this->PCE10;
    }

    public function setPCE10(?int $PCE10): self
    {
        $this->PCE10 = $PCE10;

        return $this;
    }

    public function getPCE11(): ?int
    {
        return $this->PCE11;
    }

    public function setPCE11(?int $PCE11): self
    {
        $this->PCE11 = $PCE11;

        return $this;
    }

    public function getPCE12(): ?int
    {
        return $this->PCE12;
    }

    public function setPCE12(?int $PCE12): self
    {
        $this->PCE12 = $PCE12;

        return $this;
    }

    public function getPCE13(): ?int
    {
        return $this->PCE13;
    }

    public function setPCE13(?int $PCE13): self
    {
        $this->PCE13 = $PCE13;

        return $this;
    }

    public function getPCE14(): ?int
    {
        return $this->PCE14;
    }

    public function setPCE14(?int $PCE14): self
    {
        $this->PCE14 = $PCE14;

        return $this;
    }

    public function getPCE15(): ?int
    {
        return $this->PCE15;
    }

    public function setPCE15(?int $PCE15): self
    {
        $this->PCE15 = $PCE15;

        return $this;
    }

    public function getPCE16(): ?int
    {
        return $this->PCE16;
    }

    public function setPCE16(?int $PCE16): self
    {
        $this->PCE16 = $PCE16;

        return $this;
    }

    public function getPCE17(): ?int
    {
        return $this->PCE17;
    }

    public function setPCE17(?int $PCE17): self
    {
        $this->PCE17 = $PCE17;

        return $this;
    }

    public function getPCE18(): ?int
    {
        return $this->PCE18;
    }

    public function setPCE18(?int $PCE18): self
    {
        $this->PCE18 = $PCE18;

        return $this;
    }

    public function getPCE19(): ?int
    {
        return $this->PCE19;
    }

    public function setPCE19(?int $PCE19): self
    {
        $this->PCE19 = $PCE19;

        return $this;
    }

    public function getPCE20(): ?int
    {
        return $this->PCE20;
    }

    public function setPCE20(?int $PCE20): self
    {
        $this->PCE20 = $PCE20;

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
