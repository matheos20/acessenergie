<?php


namespace App\Validator;


use App\Entity\Electricite;
use App\Entity\Gaz;
use App\Form\Request\AuthorizationRequest;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AuthorizationRequestValidator
{
    public static function validate(AuthorizationRequest $authorizationRequest, ExecutionContextInterface $context, $payload)
    {
        if ($authorizationRequest->getIsNaturalGaz() && $authorizationRequest->getIsTwentyGaz()) {
            self::checkGazIsValid($authorizationRequest->getGazNatural(), $context);
        }
        if ($authorizationRequest->getIsElectricite() && $authorizationRequest->getIsTwentyElec()) {
            self::checkElecIsValid($authorizationRequest->getElectricite(), $context);
        }
    }

    private static function checkGazIsValid(Gaz $gaz, ExecutionContextInterface &$context)
    {
        for ($i = 1; $i <= 20; $i++) {
            $methodName = "getPCE$i";
            if ($gaz->{$methodName}()) {
                return true;
            }
        }
        for ($i = 1; $i <= 20; $i++) {
            $context->buildViolation("Entrer au moins une valeur dans ces champs")
                ->atPath("gazNatural.PCE$i")
                ->addViolation();
        }
        return false;
    }

    private static function checkElecIsValid(Electricite $elec, ExecutionContextInterface &$context)
    {
        for ($i = 1; $i <= 20; $i++) {
            $methodName = "getPDL$i";
            if ($elec->{$methodName}()) {
                return true;
            }
        }
        for ($i = 1; $i <= 20; $i++) {
            $context->buildViolation("Entrer au moins une valeur dans ces champs")
                ->atPath("electricite.PDL$i")
                ->addViolation();
        }
        return false;
    }
}