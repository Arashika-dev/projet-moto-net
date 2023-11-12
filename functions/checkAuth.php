<?php 
require_once __DIR__ ."/../classes/Utils.php";
function isAuthentified (){
    if (!isset($_SESSION['userInfos'])) {
        $_SESSION['loginErrorMessage'] = "Vous devez être identifié pour accéder à cette page";
        Utils::redirect('login.php');
    }
}

function isAdmin (){
    if (!$_SESSION['userInfos']['is_admin']) {
        $_SESSION['loginErrorMessage'] = "Vous n'avez pas les droits pour accéder à cette page";
        Utils::redirect('login.php');
    }
}