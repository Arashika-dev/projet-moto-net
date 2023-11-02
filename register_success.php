<?php 
session_start();
require_once __DIR__ ."/classes/Utils.php";

if (!isset($_SESSION['userInfos'])) {
    $_SESSION['loginErrorMessage'] = "Vous devez être identifié pour accéder à cette page";
    Utils::redirect('login.php');
}

$pageTitle = 'Félicitations !';
require_once __DIR__ ."/layout/header.php";

?>

<main>
    <div class="container my-5 text-center">
        <h1>Félicitations <?php echo $_SESSION['userInfos']['pseudo']?>, votre compte à été créé !</h1>
    </div>
</main>

<?php require_once __DIR__ ."/layout/footer.php";