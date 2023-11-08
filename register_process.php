<?php 
session_start();
require_once __DIR__ ."/classes/Utils.php";
require_once __DIR__ ."/classes/Register.php";
require_once __DIR__ ."/classes/Errors.php";
require_once __DIR__ ."/functions/db.php";


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
        'id' => $pdo->lastInsertId(),
        'admin' => $user['user_is_admin']
    ];
    Utils::redirect('register_success.php');

    

    } catch (DuplicateEmailException | EmptyException | InvalidEmailException |DifferentPasswordException | DuplicatePseudoException $e) {
        Utils::redirect('register.php?error='. $e->getCode() . $register->getGetParam('&'));
    } catch (PDOException | Exception $e) {
        Utils::redirect('register.php?error='. $e->getMessage() . $register->getGetParam('&'));
    }