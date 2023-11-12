<?php

session_start();

require_once 'classes/Errors.php';
require_once 'classes/Utils.php';
require_once 'functions/db.php';


if (!isset($_POST['email']) || !isset($_POST['password'])) {
    Utils::redirect('login.php');
}

[
    'email' => $email,
    'password' => $password
] = $_POST;

try {
    $pdo = getConnection();
} catch (PDOException) {
    Utils::redirect('login.php?error=' . Errors::DB_CONNECTION);
}

$query = "SELECT * FROM users WHERE user_email = ?";
$connectStmt = $pdo->prepare($query);
$connectStmt->execute([$email]);
// Récupération de l'utilisateur
$user = $connectStmt->fetch();

if ($user === false) {
    Utils::redirect('login.php?error=' . Errors::USER_NOT_FOUND);
}

// Vérification du mot de passe
if (!password_verify($password, $user['user_password'])) {
    Utils::redirect('login.php?error=' . Errors::INVALID_CREDENTIALS);
}

$_SESSION['userInfos'] = [
    'id' => $user['user_id'],
    'pseudo' => $user['user_pseudo'],
    'is_admin' => $user['user_is_admin']
];

Utils::redirect('index.php');