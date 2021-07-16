<?php

namespace App\Form\Request;

class ClientRecherche{
    
    private $social_reason;
    
    public function getSocialReason(): ?string
    {
        return $this->social_reason;
    }

    public function setSocialReason(string $social_reason): self
    {
        $this->social_reason = $social_reason;

        return $this;
    }
}