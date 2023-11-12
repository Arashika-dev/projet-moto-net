<?php 
session_start();
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/classes/Errors.php";

?>

<main>
    <div class="container mt-4">
        <h1 class="text-center">Connexion</h1>
        <div class="col-lg-4 offset-lg-4 mt-3">
            <div class="border rounded p-3">
            <?php if (isset($_SESSION['loginErrorMessage'])) { ?>
                <div class="p-4 alert alert-danger">
                    <?php echo $_SESSION['loginErrorMessage'];
                    unset($_SESSION['loginErrorMessage']) ?>
                </div>
            <?php } ?>
            <?php if (isset($_GET['error'])) { ?>
                <div class="p-4 alert alert-danger">
                    <?php echo Errors::getErrorMessage($_GET['error']); ?>
                </div>
            <?php } ?>
                <form action="login_process.php" method="POST">
                    <div class="my-2">
                        <label for="login" class="form-label">Identifiant :</label>
                        <input type="email" name="email" id="login" placeholder="Votre email..." class="form-control" required>
                    </div>
                    <div class="my-2">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe.." class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2" type="submit">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php 
require_once __DIR__ ."/layout/footer.php";