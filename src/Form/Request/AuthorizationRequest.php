<?php
namespace App\Form\Request;

use App\Entity\Electricite;
use App\Entity\Gaz;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Assert\Callback({"App\Validator\AuthorizationRequestValidator", "validate"})
 */
class AuthorizationRequest{

    /**
     * @var ?bool
     */
    private $isNaturalGaz;

    /**
     * @var ?bool
     */
    private $isElectricite;

    /***
     * @var Gaz
     */
    private $gazNatural;

    /**
     * @var Electricite
     */
    private $electricite;

    /**
     * @var ?bool
     */
    private $isMoreThanTwentyGaz;

    /**
     * @var ?bool
     */
    private $isTwentyGaz;

    /**
     * @var ?bool
     */
    private $isMoreThanTwentyElec;

    /**
     * @var ?bool
     */
    private $isTwentyElec;

    /**
     * @return mixed
     */
    public function getIsNaturalGaz()
    {
        return $this->isNaturalGaz;
    }

    /**
     * @param mixed $isNaturalGaz
     * @return AuthorizationRequest
     */
    public function setIsNaturalGaz($isNaturalGaz)
    {
        $this->isNaturalGaz = $isNaturalGaz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsElectricite()
    {
        return $this->isElectricite;
    }

    /**
     * @param mixed $isElectricite
     * @return AuthorizationRequest
     */
    public function setIsElectricite($isElectricite)
    {
        $this->isElectricite = $isElectricite;
        return $this;
    }

    /**
     * @return Gaz
     */
    public function getGazNatural()
    {
        return $this->gazNatural;
    }

    /**
     * @param Gaz $gazNatural
     * @return AuthorizationRequest
     */
    public function setGazNatural($gazNatural)
    {
        $this->gazNatural = $gazNatural;
        return $this;
    }

    /**
     * @return Electricite
     */
    public function getElectricite()
    {
        return $this->electricite;
    }

    /**
     * @param Electricite $electricite
     * @return AuthorizationRequest
     */
    public function setElectricite($electricite)
    {
        $this->electricite = $electricite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsMoreThanTwentyGaz()
    {
        return $this->isMoreThanTwentyGaz;
    }

    /**
     * @param mixed $isMoreThanTwentyGaz
     * @return AuthorizationRequest
     */
    public function setIsMoreThanTwentyGaz($isMoreThanTwentyGaz)
    {
        $this->isMoreThanTwentyGaz = $isMoreThanTwentyGaz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsTwentyGaz()
    {
        return $this->isTwentyGaz;
    }

    /**
     * @param mixed $isTwentyGaz
     * @return AuthorizationRequest
     */
    public function setIsTwentyGaz($isTwentyGaz)
    {
        $this->isTwentyGaz = $isTwentyGaz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsMoreThanTwentyElec()
    {
        return $this->isMoreThanTwentyElec;
    }

    /**
     * @param mixed $isMoreThanTwentyElec
     * @return AuthorizationRequest
     */
    public function setIsMoreThanTwentyElec($isMoreThanTwentyElec)
    {
        $this->isMoreThanTwentyElec = $isMoreThanTwentyElec;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsTwentyElec()
    {
        return $this->isTwentyElec;
    }

    /**
     * @param mixed $isTwentyElec
     * @return AuthorizationRequest
     */
    public function setIsTwentyElec($isTwentyElec)
    {
        $this->isTwentyElec = $isTwentyElec;
        return $this;
    }
}