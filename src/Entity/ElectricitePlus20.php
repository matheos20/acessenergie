<?php

namespace App\Entity;

use App\Repository\ElectricitePlus20Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ElectricitePlus20Repository::class)
 */
class ElectricitePlus20
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
    private $electriciteplus20;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="electricitePlus20s")
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getElectriciteplus20(): ?string
    {
        return $this->electriciteplus20;
    }

    public function setElectriciteplus20(?string $electriciteplus20): self
    {
        $this->electriciteplus20 = $electriciteplus20;

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
