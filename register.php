<?php 

$lastName   = $_GET['lname']    ?? '';
$firstName  = $_GET['fname']    ?? '';
$pseudo     = $_GET['pseudo']   ?? '';
$email      = $_GET['email']    ?? '';

require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/classes/Errors.php";

?>
<main class="bg-light">
    <h1 class="text-center my-2">Inscription</h1>
    <div class="container">
        <div class="row my-5">
                <div class="col-lg-3">
    
                </div>
                <div class="col-lg-6 border border-warning rounded px-5 py-4">
                    <?php 
                        if(isset($_GET["error"])){ ?>
                    <div class="alert alert-danger">
                            <?php echo Errors::getErrorMessage(intval($_GET['error'])); ?>
                    </div>    
                            <?php } ?>
                    
                    <form method="POST" action="register_process.php">
                        <div class="row">
                            <div class="col mb-3 ">
                                <label for="lastName" class="form-label">Nom : </label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Entrez votre nom ici..." value="<?php echo $lastName ?>" required>
                            </div>
                            <div class="col mb-3">
                                <label for="firstName" class="form-label">Prénom : </label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Entrez votre prénom..." value="<?php echo $firstName ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pseudo" class="form-label">Pseudo :</label>
                            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Choisissez votre pseudo ..." value="<?php echo $pseudo ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label" >E-mail : </label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrez votre email ici ..." value="<?php echo $email ?>" required>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="password" class="form-label">Mot de passe : </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe ici..." value="" required>
                            </div>
                            <div class="col mb-3">
                                <label for="confirm-password" class="form-label">Confirmez votre mot de passe : </label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirmez votre mot de passe ici..." value="" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning mt-2">S'inscrire</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
    
                </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ ."/layout/footer.php";