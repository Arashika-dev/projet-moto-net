<?php 
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ ."/functions/db.php";
require_once __DIR__ ."/functions/checkAuth.php";

isAuthentified();
$pdo = getConnection();

$type = $pdo->query("SELECT * FROM type");

?>

<main>
    <div class="container mt-5">
        <h1 class="text-center">Rédiger un article</h1>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="border rounded p-3">
                    <form action="edition_article_process.php" enctype="multipart/form-data" method="POST">
                        <div class="col-6 offset-3 my-2">
                            <label for="type" class="form-label">Type article</label>
                            <select name="type" id="type" class="form-select w-50" aria-label="Type Article">
                                <?php 
                                    while($row = $type->fetch()) 
                                    { ?>
                                        <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name']?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 offset-3 my-2">
                            <label for="title" class="form-label">Titre de l'article :</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="col-6 offset-3 my-2">
                            <label for="imgCover" class="form-label" >Image de couverture :</label>
                            <input type="file" class="form-control" name="imgCover" id="imgCover" required>
                        </div>
                        <div class="col-6 offset-3 my-2">
                            <label for="" class="form-label" >Image du contenu :</label>
                            <input type="file" class="form-control" name="imgContent" id="imgContent" required>
                        </div>
                        <div class="col-10 offset-1 my-2">
                            <label for="" class="form-label">Texte article :</label>
                            <textarea class="form-control" rows="15" name="content" id="content"></textarea required>
                        </div>
                        <div class="col-6 offset-3 my-2">
                            <label for="video" class="form-label">Vidéo (facultatif)</label>
                            <input type="text" class="form-control" name="video" id="video" placeholder="Copiez votre lien youtube ici">
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary" type="submit">Publier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require_once __DIR__ . '/layout/footer.php';