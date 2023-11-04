<?php 
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/functions/db.php";
require_once __DIR__ ."/classes/Profile.php";

if (!isset($_SESSION['userInfos'])) {
    $_SESSION['loginErrorMessage'] = "Vous devez être identifié pour accéder à cette page";
    Utils::redirect('login.php');
}

$pdo = getConnection();
$profile = new Profile($_SESSION['userInfos']['id'],$pdo)
?>

<main>
    <div class="container my-4">
        <div class="row p-1">
            <div class="col-9 d-lg-flex flex-row border rounded py-3">
                <div class="col-md-4 pt-4 ps-5">
                        <img src="img/profile_picture/<?php echo $profile->getProfilePicture() ?>" width="200px" height="200px" alt="" class="border rounded-circle">
                </div>
                <div class="col-md-8 offset-md-1">
                    <form action="">
                        <div class="col-4 mb-3">
                            <label for="pseudo" class="form-label">Pseudo :</label>
                            <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?php echo $profile->getPseudo() ?>" disabled>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 mx-0">
                                <label for="" class="form-label">Prénom :</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $profile->getFirstName() ?>" disabled>
                            </div>
                            <div class="col-5 mx-0">
                                <label for="" class="form-label">Nom :</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $profile->getLastName() ?>" disabled>
                            </div>
                        </div>
                        <div class="col-10 mb-3">
                            <label for="" class="form-label">Email :</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $profile->getEmail() ?>" disabled>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="" class="form-label">Mot de passe :</label>
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo $profile->getPassword() ?>" disabled>
                            </div>
                            <div class="col-5 hidden">
                                <label for="" class="form-label d-none">Confirmation mot de passe :</label>
                                <input type="password" class="form-control d-none" name="password" id="password" value="" placeholder="Confirmez votre mot de passe ...">
                            </div>
                        </div>
                        <div class="col-5 mb-3 d-none">
                            <label for="profilePic" class="form-label">Modifiez votre photo de profil :</label>
                            <input type="file" name="profilePic" id="profilePic" class="form-control">
                        </div>
                        <div>
                            <button id="modifierBtn" class="btn btn-warning">Modifier</button>
                            <button id="submitBtn" type="submit" class="btn btn-primary d-none">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
            
            </div>
        </div>
    </div>
</main>
<script src="js/profile.js"></script>
<?php require_once __DIR__ .'/layout/footer.php';