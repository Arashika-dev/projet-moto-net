<?php 

class Errors {
    public const EMAIL_INVALID   = 1;
    public const EMAIL_DUPLICATE = 2;
    public const EMPTY = 3;
    public const PASS_DIFFERENT = 4;
    public const PSEUDO_DUPLICATE = 5;

public static function getErrorMessage(int $errorCode): string
{
    return match ($errorCode) {
        self::EMPTY => "Tous les champs sont obligatoire",
        self::EMAIL_INVALID => "Le format de l'email est incorrect",
        self::EMAIL_DUPLICATE => "L'email existe déjà dans la base de données",
        self::PASS_DIFFERENT => "Les mots de passe doivent être identiques",
        self::PSEUDO_DUPLICATE => "Ce pseudo existe déjà",
        default => "Une erreur est survenue"
    };
}

}