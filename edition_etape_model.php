<?php 
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/classes/Utils.php";
require_once __DIR__ ."/functions/db.php";

if(!isset($_GET["brand"]) || !isset($_GET["category"])) {
    Utils::redirect("edition.php");
};

$category = $_GET['category'];
$brand = $_GET['brand'];
$modelQuery = 'SELECT * FROM model_moto WHERE id_category_moto =  :id_category_moto AND id_brand = :id_brand ';
$pdo = getConnection(); 
$stmt = $pdo->prepare($modelQuery);
$stmt->bindValue('id_category_moto', $category);
$stmt->bindValue('id_brand', $brand);
$stmt->execute();

$emptyresult = false;
$stmt->rowCount() < 1 ? $emptyresult = true : false;    

?>
<main>
    <section class="container">
        <h1 class="mb-4 fs-3">Choix du modèle moto</h1>
        <form action="">
            <div class="col-3">
                <select name="model" id="model" class="form-select" aria-label="Modèle moto">
                <?php
                    if ($emptyresult) { ?>
                        <option value="0"><?php echo 'Aucun modèle correspondant' ?></option>
                    </select>
                    <?php }else {
                        while($row = $stmt->fetch())
                        { ?>
                            <option value="<?php echo $row['model_id']?>"><?php echo $row['model_name'] . ' - ' . $row['year'] ?></option>
                    <?php } ?>
                    </select>
                    <button class="btn btn-primary mt-4" type="submit">Étape suivante</button>        
                    <?php } ?>
            </div>
        </form>
        <?php if($emptyresult){ ?>
            <div class="col-3 my-3">
                <!-- Direction page d'ajout de modèle moto si modèle inexistant -->
                <a href="edition_add_model.php?<?php echo 'brand=' . $brand . '&' . 'category=' . $category ?>" class="btn btn-success mt-3">Ajouter un modèle</a>
            </div>
        <?php } ?>
    </section>
</main>

<?php require_once __DIR__ ."/layout/footer.php";