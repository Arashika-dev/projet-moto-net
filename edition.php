<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ ."/functions/db.php";

$pdo = getConnection();

$brand = $pdo->query("SELECT * FROM brand");
$type = $pdo->query("SELECT * FROM type");
?>

<main>
    <section class="container">
        <h1>Créez votre article</h1>
        <div class="col-lg-3">
            <form action="edition_publication.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3">
                    <label for="type" class="form-label">Type article</label>
                    <select name="type" id="type" class="form-select" aria-label="Type Article">
                        <?php 
                            while($row = $type->fetch()) 
                            { ?>
                                <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name']?></option>
                            <?php }
                        ?>
                    </select>
                </div>
            </form>
        </div>
    </section>
</main>

<?php
require_once __DIR__ ."/layout/footer.php";