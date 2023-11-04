<?php
require_once __DIR__ ."/Email.php";
class Profile
{
    private string $lastName;
    private string $firstName;
    private string $pseudo;
    private Email $email;
    private string $password;
    private string $confirmPassword;
    private string $profilePicture;
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
        $this->profilePicture = $user['user_profile_picture'] ?? 'default.png';
    }

    public function updateProfile(PDO $pdo)
    {


    }


    public function getLastName(): string { return $this->lastName; }
    

    public function getFirstName(): string { return $this->firstName; }

    public function getPseudo(): string { return $this->pseudo; }

    public function getPassword(): string { return $this->password; }

    public function getProfilePicture(): string { return $this->profilePicture; }

    public function getEmail(): string { return $this->email->getEmail(); }
}