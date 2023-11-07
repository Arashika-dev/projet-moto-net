<?php 

class Errors {
    public const EMAIL_INVALID          = 1;
    public const EMAIL_DUPLICATE        = 2;
    public const EMPTY                  = 3;
    public const PASS_DIFFERENT         = 4;
    public const PSEUDO_DUPLICATE       = 5;
    public const DB_CONNECTION          = 6;
    public const INVALID_CREDENTIALS    = 7;
    public const USER_NOT_FOUND         = 8;
    public const REGISTER_FILE_UPLOAD   = 9;
    public const WRONG_PASSWORD         = 10;

public static function getErrorMessage(int $errorCode): string
{
    return match ($errorCode) {
        self::EMPTY                 => "Tous les champs sont obligatoire",
        self::EMAIL_INVALID         => "Le format de l'email est incorrect",
        self::EMAIL_DUPLICATE       => "L'email existe déjà dans la base de données",
        self::PASS_DIFFERENT        => "Les mots de passe doivent être identiques",
        self::PSEUDO_DUPLICATE      => "Ce pseudo existe déjà",
        self::DB_CONNECTION         => "Erreur lors de la connexion à la base de donnée",
        self::INVALID_CREDENTIALS   => "Identifiants invalides",
        self::USER_NOT_FOUND        => "Utilisateur inconnu",
        self::REGISTER_FILE_UPLOAD  => "Erreur lors de l'upload de fichier",
        self::WRONG_PASSWORD        => "Mot de passe incorrect",
        default                     => "Une erreur est survenue"
    };
}

}