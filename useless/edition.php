<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ ."/functions/db.php";
$_SESSION['articleInfos'] = [];
$pdo = getConnection();

$type = $pdo->query("SELECT * FROM type");
$brand = $pdo->query("SELECT * FROM brand");
$category = $pdo->query("SELECT * FROM category_moto");
?>

<main>
    <section class="container">
        <h1 class="mb-5">Poster un article</h1>
        
            <form action="edition_etape_model.php" method="GET">
                <div class="col-2 mb-3">
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
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <label for="brand" class="form-label">Marque :</label>
                        <select name="brand" id="brand" class="form-select" aria-label="Marques moto">
                            <?php 
                                while($row = $brand->fetch())
                                { ?>
                                    <option value="<?php echo $row['brand_id']?>"><?php echo $row['brand_name'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="category" class="form-label">Catégorie :</label>
                        <select name="category" id="category" class="form-select" aria-label="Marques moto">
                            <?php 
                                while($row = $category->fetch())
                                { ?>
                                    <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Étape suivante</button>
                </div>
            </form>
    </section>
</main>

<?php
require_once __DIR__ ."/layout/footer.php";