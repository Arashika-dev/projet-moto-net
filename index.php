<?php 
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/functions/db.php";

$pdo = getConnection();
$actuQuery = 'SELECT * FROM article WHERE id_type = 2 ORDER BY date_of_publication DESC LIMIT 3';
$actuStmt = $pdo->prepare($actuQuery);
$actuStmt->execute();
$lastActu = $actuStmt->fetchAll(PDO::FETCH_ASSOC);

$essaiQuery = 'SELECT * FROM article WHERE id_type = 1 ORDER BY date_of_publication DESC LIMIT 3';
$essaiStmt = $pdo->prepare($essaiQuery);
$essaiStmt->execute();
$lastEssai = $essaiStmt->fetchAll(PDO::FETCH_ASSOC);

$isLeftAligned = true;
?>

<main>
    <section class="container-fluid mt-4"> 
        <h1 class="text-center">Le journal moto du net</h1>
    </section>

    <!-- Actualités -->
    <section class="container mt-5">
        <h2>Nos dernières actualités</h2>
        <?php
        foreach ($lastActu as $row) {
            require __DIR__ .'/layout/index_article_reverse_preview.php';
        }
        ?>
    </section>

    <!-- Essais -->
    <section class="container mt-5 border-top pt-3">
        <h2>Nos derniers Essais</h2>
        <?php
        foreach ($lastEssai as $row) {
            require __DIR__ .'/layout/index_article_reverse_preview.php';
        }
        ?>
    </section>

</main>


<?php
require_once __DIR__ ."/layout/footer.php";