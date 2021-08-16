<?php

namespace App\Entity;

use App\Repository\GazRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE1;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $PCE2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE9;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE10;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE11;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE12;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE13;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE14;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE15;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE16;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE17;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE18;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE19;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PCE20;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="gaz")
     */
    private $client;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAlreadyAuthorized;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $tokenToConfirmAuthorization;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPCE1(): ?string
    {
        return $this->PCE1;
    }

    public function setPCE1(string $PCE1): self
    {
        $this->PCE1 = $PCE1;

        return $this;
    }

    public function getPCE2(): ?string
    {
        return $this->PCE2;
    }

    public function setPCE2(string $PCE2): self
    {
        $this->PCE2 = $PCE2;

        return $this;
    }

    public function getPCE3(): ?string
    {
        return $this->PCE3;
    }

    public function setPCE3(string $PCE3): self
    {
        $this->PCE3 = $PCE3;

        return $this;
    }

    public function getPCE4(): ?string
    {
        return $this->PCE4;
    }

    public function setPCE4(string $PCE4): self
    {
        $this->PCE4 = $PCE4;

        return $this;
    }

    public function getPCE5(): ?string
    {
        return $this->PCE5;
    }

    public function setPCE5(string $PCE5): self
    {
        $this->PCE5 = $PCE5;

        return $this;
    }

    public function getPCE6(): ?string
    {
        return $this->PCE6;
    }

    public function setPCE6(string $PCE6): self
    {
        $this->PCE6 = $PCE6;

        return $this;
    }

    public function getPCE7(): ?string
    {
        return $this->PCE7;
    }

    public function setPCE7(string $PCE7): self
    {
        $this->PCE7 = $PCE7;

        return $this;
    }

    public function getPCE8(): ?string
    {
        return $this->PCE8;
    }

    public function setPCE8(string $PCE8): self
    {
        $this->PCE8 = $PCE8;

        return $this;
    }

    public function getPCE9(): ?string
    {
        return $this->PCE9;
    }

    public function setPCE9(string $PCE9): self
    {
        $this->PCE9 = $PCE9;

        return $this;
    }

    public function getPCE10(): ?string
    {
        return $this->PCE10;
    }

    public function setPCE10(string $PCE10): self
    {
        $this->PCE10 = $PCE10;

        return $this;
    }

    public function getPCE11(): ?string
    {
        return $this->PCE11;
    }

    public function setPCE11(string $PCE11): self
    {
        $this->PCE11 = $PCE11;

        return $this;
    }

    public function getPCE12(): ?string
    {
        return $this->PCE12;
    }

    public function setPCE12(string $PCE12): self
    {
        $this->PCE12 = $PCE12;

        return $this;
    }

    public function getPCE13(): ?string
    {
        return $this->PCE13;
    }

    public function setPCE13(string $PCE13): self
    {
        $this->PCE13 = $PCE13;

        return $this;
    }

    public function getPCE14(): ?string
    {
        return $this->PCE14;
    }

    public function setPCE14(string $PCE14): self
    {
        $this->PCE14 = $PCE14;

        return $this;
    }

    public function getPCE15(): ?string
    {
        return $this->PCE15;
    }

    public function setPCE15(string $PCE15): self
    {
        $this->PCE15 = $PCE15;

        return $this;
    }

    public function getPCE16(): ?string
    {
        return $this->PCE16;
    }

    public function setPCE16(string $PCE16): self
    {
        $this->PCE16 = $PCE16;

        return $this;
    }

    public function getPCE17(): ?string
    {
        return $this->PCE17;
    }

    public function setPCE17(string $PCE17): self
    {
        $this->PCE17 = $PCE17;

        return $this;
    }

    public function getPCE18(): ?string
    {
        return $this->PCE18;
    }

    public function setPCE18(string $PCE18): self
    {
        $this->PCE18 = $PCE18;

        return $this;
    }

    public function getPCE19(): ?string
    {
        return $this->PCE19;
    }

    public function setPCE19(string $PCE19): self
    {
        $this->PCE19 = $PCE19;

        return $this;
    }

    public function getPCE20(): ?string
    {
        return $this->PCE20;
    }

    public function setPCE20(string $PCE20): self
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

    /**
     * @return bool
     */
    public function getIsAlreadyAuthorized()
    {
        return $this->isAlreadyAuthorized;
    }

    /**
     * @param bool $isAlreadyAuthorized
     * @return Gaz
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
     * @return Gaz
     */
    public function setTokenToConfirmAuthorization($tokenToConfirmAuthorization)
    {
        $this->tokenToConfirmAuthorization = $tokenToConfirmAuthorization;
        return $this;
    }

}
