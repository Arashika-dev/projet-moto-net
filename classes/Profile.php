<?php
require_once __DIR__ ."/Email.php";
require_once __DIR__ ."/File.php";
require_once __DIR__ ."/DuplicateChecker.php";
require_once __DIR__ ."/PasswordChecker.php";
require_once __DIR__ ."/Exceptions/DuplicatePseudoException.php";
require_once __DIR__ ."/Exceptions/DifferentPasswordException.php";
require_once __DIR__ ."/Exceptions/BadPasswordException.php";
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
        private PDO $pdo
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

    public function updatePseudo($pdo, string $newPseudo):void
    {
        $checker = new DuplicateChecker($pdo);
    if($checker->isDuplicate($newPseudo, 'pseudo', $this->id)) {
        throw new DuplicatePseudoException();
    }
        self::updateRequest($pdo,'pseudo', $newPseudo);
    }

    public function updateFullName(PDO $pdo,string $newFirstName,string $newLastName):void
    {
        self::updateRequest($pdo,'firstname', $newFirstName);
        self::updateRequest($pdo,'name', $newLastName);
    }

    public function updateEmail(PDO $pdo, Email $newEmail):void
    {
        $email = $newEmail->getEmail();
        $checker = new DuplicateChecker($pdo);
        if($checker->isDuplicate($email, 'email', $this->id)) {
            throw new DuplicateEmailException();
        }
        self::updateRequest($pdo,'email', $email);
    }

    public function updatePassword(PDO $pdo, string $currentPassword, string $newPassword, string $confirmPassword):void
    {
        if(!password_verify($this->password, $currentPassword)) {
            throw new BadPasswordException();
        }

        $comparePass = new PasswordChecker($newPassword, $confirmPassword);
        if($comparePass->isDifferent()) {
            throw new DifferentPasswordException();
        }

        self::updateRequest($pdo,'password', password_hash($currentPassword, PASSWORD_DEFAULT));
    }
    public function updateProfilePicture (PDO $pdo) : void
    {
            //Retain the previous file name as a backup in case the upload is successful
            $oldPictureName = self::getProfilePicture();
            $oldPicturePath = 'uploads/profile_picture/' . $oldPictureName;

            $profilePicture = new File('profilePicture');
            $fileName =  $profilePicture->uploadFile('uploads/profile_picture/','profilePic');
            self::updateRequest($pdo,'profile_picture', $fileName);

            //Delete old picture
            if (strcmp($oldPictureName, 'default.png') !== 0)
            {
                unlink($oldPicturePath);
            }

    }
    private function updateRequest(PDO $pdo, string $fieldUpdate,string $valueUpdate) : void
    {
        $id = $this->id;
        $query = 'UPDATE users SET user_' . $fieldUpdate . ' = :update WHERE user_id = :id';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':update', $valueUpdate);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getLastName(): string { return $this->lastName; }
    

    public function getFirstName(): string { return $this->firstName; }

    public function getPseudo(): string { return $this->pseudo; }

    public function getPassword(): string { return $this->password; }

    public function getProfilePicture(): string { return $this->profilePicture->getFileName(); }

    public function getEmail(): string { return $this->email->getEmail(); }
}