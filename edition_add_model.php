<?php 
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/functions/db.php";

$pdo = getConnection();

$brand = $pdo->query("SELECT * FROM brand");
$category = $pdo->query("SELECT * FROM category_moto");
?>

<main>
    <section class="container">
        <h1 class="fs-3 text-center mb-4">Ajout de modèle moto</h1>
        <div class="border rounded col-6 offset-3 p-4">
            <form action="edition_add_model_process.php" method="POST">
                <div class="row">
                    <div class="col-6">
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
                    <div class="col-6">
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
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="model" class="form-label">Modèle :</label>
                        <input type="text" value="" name="model" id="model" placeholder="Nom du modèle" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label for="year" class="form-label">Année :</label>
                        <input type="text" value="" name="year" id="year" placeholder="Année du modèle" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Ajouter</button>
            </form>
        </div>
    </section>
</main>

<?php require_once __DIR__ ."/layout/footer.php";