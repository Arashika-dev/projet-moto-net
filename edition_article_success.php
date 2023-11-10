<?php 
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/functions/checkAuth.php";
isAuthentified();
$articleId = $_GET['id'];
?>
<main>
    <section class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1>Félicitations, votre article à été publié avec succès !</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2 offset-3">
                <a href="edition_article.php" class="btn btn-primary">Publier un autre article</a>    
            </div>
            <div class="col-2 offset-1">
                <a href="article_display.php?id=<?php echo $articleId ?>" class="btn btn-primary">Afficher l'article</a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ ."/layout/footer.php";