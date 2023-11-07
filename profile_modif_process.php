<?php 
session_start();
require_once __DIR__ ."/classes/Errors.php";

if (!isset($_SESSION['userInfos'])) {
    $_SESSION['loginErrorMessage'] = "Vous devez être identifié pour accéder à cette page";
    Utils::redirect('login.php');
}




require_once __DIR__ .'/classes/Profile.php';
require_once __DIR__ .'/functions/db.php';
require_once __DIR__ .'/classes/Utils.php';
$pdo = getConnection();

$profile = new Profile($_SESSION['userInfos']['id'], $pdo);

if (empty($_POST)) {
    if (isset($_FILES['profilePic'])) {
    try {
        $profile->updateProfilePicture($pdo);
        Utils::redirect('profile.php');
    }catch (FailedUploadException $e) {
        Utils::redirect('profile.php?error' . $e->getCode());
    }
    }else {
        Utils::redirect('profile.php?error=' . Errors::EMPTY);
    }
}

if (isset($_POST['pseudo']))
{
    try {
        $profile->updatePseudo($pdo,$_POST['pseudo']);
        $_SESSION['userInfos']['pseudo']= $profile->getPseudo();
        Utils::redirect('profile.php?success=');
    }catch(DuplicatePseudoException $e) {
        Utils::redirect('profile.php?error=' . $e->getCode());
    }
}

if (isset($_POST['firstName']) && isset($_POST['lastName']))
{
    try {
        $profile->updateFullName($pdo, $_POST['firstName'], $_POST['lastName']);
    }catch(Exception $e) {
        Utils::redirect('profile.php?error=' . $e->getCode());
    }
        
}

if (isset($_POST['email']))
{
    try {
        $profile->updateEmail($pdo, $_POST['email']);
    }catch (InvalidEmailException | DuplicateEmailException) {
        Utils::redirect('profile.php?error=' . $e->getCode());
    }
}

if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']))
{
    try {
        $profile->updatePassword($pdo, $_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmPassword']);
        Utils::redirect('profile.php?success=');
    }catch(BadPasswordException | DifferentPasswordException $e) {
        Utils::redirect('profile.php?error=' . $e->getCode());
    }
}

