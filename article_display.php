<?php
require_once __DIR__ . "/layout/header.php"; 
require_once __DIR__ ."/classes/Article.php";
require_once __DIR__ ."/classes/Profile.php";
require_once __DIR__ ."/functions/db.php";
$pdo = getConnection();
$article = new Article();
$article->getArticle($_GET['id']);
$profile = new Profile(intval($article->getUserId()), $pdo);
$query = "SELECT type_name FROM type WHERE type_id = " . $article->getTypeId();
$typeStmt = $pdo->query($query);
$type = $typeStmt->fetch();
?>

<main>

    <section class="container mt-4">
        <h1 class="text-center my-3"><?php echo $article->getTitle(); ?></h1>
        <div class="text-center">
            <?php foreach($article->getTags() as $tag) { ?>
                <span class="badge rounded-pill text-bg-warning"><?php echo $tag ?></span>

            <?php }?>
        </div>
        <div class="row my-3">
            <div class="col-lg-3 d-flex align-items-start justify-content-start fst-italic flex-column">
                <h2 class="fs-5"><?php echo $type['type_name'] ?></h2>
                <p class="fs-6">Le <?php echo $article->getDate() ?> de <?php echo $profile->getPseudo() ?></p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <img src="uploads/articles/<?php echo $article->getImgCoverName(); ?>" alt="Image article de couverture" class="img-fluid">
            </div>
            <div class="col-lg-3">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-6 text-start">
                <p>
                    <?php echo nl2br($article->getTextContent()) ?>
                </p>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
                <img src="uploads/articles/<?php echo $article->getImgContentName(); ?>" alt="Image contenu" class="img-fluid">
            </div>
        </div>
    </section>
    <?php if (strlen($article->getYoutubeShortLink()) > 0) { ?>
    <section class="container my-4">
        <h2 class="text-center mb-3">En vidéo</h2>
        <div class="col-lg-6 offset-3">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $article->getYoutubeShortLink() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </section>
    <?php } ?>
</main>

<?php require_once __DIR__ ."/layout/footer.php";