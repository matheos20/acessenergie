<?php

namespace App\Entity;

use App\Repository\GazPlus20Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GazPlus20Repository::class)
 */
class GazPlus20
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
    private $gazplus20;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="gazPlus20s")
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
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $horodatage;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGazplus20(): ?string
    {
        return $this->gazplus20;
    }

    public function setGazplus20(?string $gazplus20): self
    {
        $this->gazplus20 = $gazplus20;

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
     * @return GazPlus20
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
     * @return GazPlus20
     */
    public function setTokenToConfirmAuthorization($tokenToConfirmAuthorization)
    {
        $this->tokenToConfirmAuthorization = $tokenToConfirmAuthorization;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getHorodatage()
    {
        return $this->horodatage;
    }

    /**
     * @param mixed $horodatage
     *
     * @return Gaz
     */
    public function setHorodatage($horodatage)
    {
        $this->horodatage = $horodatage;

        return $this;
    }

}
