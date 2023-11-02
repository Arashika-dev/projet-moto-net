<?php 

require_once __DIR__ ."/Email.php";
require_once __DIR__ ."/DuplicateChecker.php";
require_once __DIR__ ."/PasswordChecker.php";
require_once __DIR__ ."/Exceptions/DuplicateEmailException.php";
require_once __DIR__ ."/Exceptions/DuplicatePseudoException.php";
require_once __DIR__ ."/Exceptions/EmptyException.php";
require_once __DIR__ ."/Exceptions/DifferentPasswordException.php";

class Register {
    private Email $email;

    public function __construct(
        private string $lastName,
        private string $firstName,
        private string $pseudo,
        string $email,
        private string $password,
        private string $confirmPassword
    ) {
        
        $this->email = new Email($email);
        if (empty($lastName) || empty($firstName) || empty($email) || empty($password) || empty($confirmPassword) || empty($pseudo)) {
            throw new EmptyException();
        }
    }

    public function addInscription(PDO $pdo):void
    {
        $email = $this->email->getEmail();
        $duplication = new DuplicateChecker($pdo);
        // Vérifie la duplication d'e-mail avant d'ajouter l'inscription
        if ($duplication->isDuplicate($email, 'email')) 
        {
            throw new DuplicateEmailException();
        }

        $pseudo = $this->pseudo; // Vérifie la duplication du pseudo avant d'ajouter l'inscription
        if ($duplication->isDuplicate($pseudo, 'pseudo')){
            throw new DuplicatePseudoException();
        }

        $comparePass = new PasswordChecker($this->password, $this->confirmPassword);
        if ($comparePass->isDifferent())
        {
            throw new DifferentPasswordException();
        }

        $firstName = $this->firstName;
        $lastName = $this->lastName;
        $password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare('INSERT INTO users (user_email, user_firstname, user_name, user_pseudo, user_password) VALUES ( :email, :first_name, :last_name, :pseudo, :password)');

        $stmt->bindValue('email', $email);
        $stmt->bindValue('first_name', $firstName);
        $stmt->bindValue('last_name', $lastName);
        $stmt->bindValue('pseudo', $pseudo);
        $stmt->bindValue('password', $password);

        $stmt->execute();
    }

    public function getGetParam(string $order):string
    {
        return $order . 'fname='. $this->firstName . '&lname=' . $this->lastName . '&pseudo=' . $this->pseudo . '&email=' . $this->email->getEmail();
    }



    public function getLastName(): string { return $this->lastName; }
    public function setLastName(string $lastName): self { $this->lastName = $lastName; return $this; }

    public function getFirstName(): string { return $this->firstName; }
    public function setFirstName(string $firstName): self { $this->firstName = $firstName; return $this; }
    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): self { $this->password = $password; return $this; }
    public function getPseudo(){return $this->pseudo; }
    public function setPseudo($pseudo): self{ $this->pseudo = $pseudo; return $this; }
}