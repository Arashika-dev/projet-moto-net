<?php 
session_start();
require_once __DIR__ ."/functions/db.php";
require_once __DIR__ ."/classes/Profile.php";
require_once __DIR__ ."/classes/Utils.php";
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/functions/checkAuth.php";

isAuthentified();
$pdo = getConnection();
$profile = new Profile($_SESSION['userInfos']['id'],$pdo);
$lastArticles = $profile->getLastArticles($pdo);
?>

<main>
    <div class="container-fluid my-4">
        <div class="row p-1">
            <div class="col-8 d-lg-flex flex-row border rounded py-3 bg-light  <?php if($_SESSION['userInfos']['is_admin'] == 0) { echo'offset-2'; } ?>">
                <div class="col-md-4 pt-4 ps-5">
                    <img src="uploads/profile_picture/<?php echo $profile->getProfilePicture() ?>" width="200px" height="200px" alt="" class="border rounded-circle">
                </div>
                <div class="col-md-8 offset-md-1">
                    <?php 
                        if (isset($_GET['error'])){ ?>
                            <div class="alert alert-danger w-50 text-center">
                                <?php echo Errors::getErrorMessage($_GET['error']) ?>
                            </div> 
                    <?php
                        }
                    ?>
                    <form action="profile_modif_process.php" method="POST">
                        <div class="row mb-3">
                            <div class="col-5 mb-3">
                                <label for="pseudo" class="form-label">Pseudo :</label>
                                <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?php echo $profile->getPseudo() ?>" disabled required>
                            </div>
                            <div>
                                <button class="btn btn-primary d-none" type="submit">Enregistrer</button>
                            </div>
                        </div>        
                    </form>
                    <form action="profile_modif_process.php" method="POST">
                        <div class="row mb-3">
                            <div class="col-5 mx-0 mb-3">
                                <label for="" class="form-label">Prénom :</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $profile->getFirstName() ?>" disabled required>
                            </div>
                            <div class="col-5 mx-0">
                                <label for="" class="form-label">Nom :</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $profile->getLastName() ?>" disabled required>
                            </div>
                            <div>
                                <button class="btn btn-primary d-none" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                    <form action="profile_modif_process.php" method="POST">
                        <div class="col-10 mb-3">
                            <label for="" class="form-label">Email :</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $profile->getEmail() ?>" disabled required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-none" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    <form action="profile_modif_process.php" method="POST">
                        <div class="col-5">
                            <label for="currentPassword" class="form-label">Mot de passe actuel :</label>
                            <input type="password" class="form-control" name="currentPassword" id="currentPassword" value="******" disabled>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <label for="newPassword" class="form-label">Nouveau mot de passe :</label>
                                <input type="password" class="form-control d-none" name="newPassword" id="newPassword" value="" placeholder="Entrez votre nouveau mot de passe" >
                            </div>
                            <div class="col-5 hidden">
                                <label for="" class="form-label d-none">Confirmation mot de passe :</label>
                                <input type="password" class="form-control d-none" name="confirmPassword" id="password" value="" placeholder="Confirmez votre mot de passe ...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-none" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    <form action="profile_modif_process.php" method="POST" enctype="multipart/form-data">
                        <div class="col-5 mb-3 d-none">
                            <label for="profilePic" class="form-label">Modifiez votre photo de profil :</label>
                            <input type="file" name="profilePic" id="profilePic" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary d-none" type="submit">Enregistrer</button>
                        </div>
                    </form>
                        <div class="mb-3">
                            <button id="modifierBtn" class="btn btn-warning">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php if($_SESSION['userInfos']['is_admin'] == 1) { ?>
                <div class="border rounded d-flex flex-column bg-light">
                    <h2 class="m-1 fs-4 fw-semibold">Vos derniers articles</h2>
                    <?php foreach ($lastArticles as $article) { ?>
                        <div class="mx-3 border-bottom pt-3">
                            <a href="article_display.php?id=<?php echo $article['article_id'] ?>" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover">
                                <h3 class="fs-5 mb-1"><?php echo $article['article_title'] ?></h3>
                                <p class="fst-italic fs-6">Le <?php echo explode(' ', $article['date_of_publication'])[0] ?></p>
                            </a>
                        </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/profile.js"></script>
<?php require_once __DIR__ .'/layout/footer.php';