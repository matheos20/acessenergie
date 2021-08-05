<?php
namespace App\Entity;
class ElectriciteRecherche{
    private $PDL1;

    /**
     * @return mixed
     */
    public function getPDL1(): ?string
    {
        return $this->PDL1;
    }

    /**
     * @param mixed $PDL1
     */
    public function setPDL1($PDL1): self
    {
        $this->PDL1 = $PDL1;
        return $this;
    }

}