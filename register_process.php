<?php 
session_start();
require_once __DIR__ ."/classes/Utils.php";
require_once __DIR__ ."/classes/Register.php";
require_once __DIR__ ."/classes/Errors.php";
require_once __DIR__ ."/functions/db.php";

function getGetParams(array $postData, bool $opening = true): string
{
    $openingCharacter = $opening ? "?" : "&";

    return $openingCharacter . 'fname='. ($postData['firstName'] ?? "") . '&lname=' . ($postData['lastName'] ?? "") . '&email=' . ($postData['email'] ?? "");
}

try {
    $pdo = getConnection();
    $register = new Register(
        $_POST['lastName'] ?? '',
        $_POST['firstName'] ?? '',
        $_POST['pseudo'] ??'',
        $_POST['email'] ?? '',
        $_POST['password'] ?? '',
        $_POST['confirm-password']);

    $register->addInscription($pdo);
    $_SESSION['userInfos'] = [
        'pseudo' => $register->getPseudo(),
        'id' => $pdo->lastInsertId()
    ];
    Utils::redirect('register_success.php');

    

    } catch (DuplicateEmailException | EmptyException | InvalidEmailException |DifferentPasswordException $e) {
        Utils::redirect('register.php?error='. $e->getCode() . getGetParams($_POST, false));
    } catch (PDOException | Exception $e) {
        Utils::redirect('register.php?error='. $e->getMessage() . getGetParams($_POST, false));
    }