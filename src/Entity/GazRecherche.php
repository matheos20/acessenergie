<?php
namespace App\Entity;
class GazRecherche {
    private $PCE1;

    /**
     * @return mixed
     */
    public function getPCE1(): ?string
    {
        return $this->PCE1;
    }

    /**
     * @param mixed $PCE1
     */
    public function setPCE1(string $PCE1): self
    {
        $this->PCE1 = $PCE1;
        return $this;
    }


}