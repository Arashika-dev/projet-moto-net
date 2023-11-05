<?php
require_once __DIR__ ."/Email.php";
require_once __DIR__ ."/File.php";
class Profile
{
    private string $lastName;
    private string $firstName;
    private string $pseudo;
    private Email $email;
    private string $password;
    private string $confirmPassword;
    private File $profilePicture;
    public function __construct(
        private int $id,
        PDO $pdo
    ) {
        $query  = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt-> execute(['id' => $this->id]);
        $user = $stmt->fetch();
        $this->lastName = $user['user_name'];
        $this->firstName = $user['user_firstname'];
        $this->pseudo = $user['user_pseudo'];
        $this->email = new Email ($user['user_email']);
        $this->password = $user['user_password'];
        $this->profilePicture = new File ($user['user_profile_picture'] ?? 'default.png');
    }

    public function updateProfile(PDO $pdo,  $newFirstName, $newLastName, $newPseudo, Email $newEmail, $newPassword, $newProfilePic)
    {
        $email = $newEmail->getEmail();
        $duplication = new DuplicateChecker($pdo);
        // Vérifie la duplication d'e-mail avant d'update en excluant ce profil
        if ($duplication->isDuplicate($email, 'email',$this->id)) 
        {
            throw new DuplicateEmailException();
        }

        // Vérifie la duplication du pseudo avant d'ajouter l'inscription
        if ($duplication->isDuplicate($newPseudo, 'pseudo', $this->id)){
            throw new DuplicatePseudoException();
        }

        $query = 'UPDATE users SET user_name = :lastName, user_firstname = :firstName, user_pseudo = :pseudo, user_email = :email, user_password = :password WHERE user_id = :id';

    }


    public function getLastName(): string { return $this->lastName; }
    

    public function getFirstName(): string { return $this->firstName; }

    public function getPseudo(): string { return $this->pseudo; }

    public function getPassword(): string { return $this->password; }

    public function getProfilePicture(): string { return $this->profilePicture->getFileName(); }

    public function getEmail(): string { return $this->email->getEmail(); }
}