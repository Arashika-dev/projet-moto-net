<?php 
require_once __DIR__ ."/layout/header.php";
require_once __DIR__ ."/classes/Utils.php";
require_once __DIR__ ."/functions/db.php";

if(!isset($_GET["brand"]) || !isset($_GET["category"])) {
    Utils::redirect("edition.php");
};

$modelQuery = 'SELECT * FROM model_moto WHERE id_category_moto =  :id_category_moto AND id_brand = :id_brand ';
$pdo = getConnection(); 
$stmt = $pdo->prepare($modelQuery);
$stmt->bindValue('id_category_moto', $_GET['category']);
$stmt->bindValue('id_brand', $_GET['brand']);
$stmt->execute();

if ($stmt->rowCount() < 1) {
    $emptyresult = true;    
}
?>
<main>
    <section class="container">
        <h1 class="mb-5">Étape 2</h1>
        <form action="">
            <div class="col-3">
                <label for="model" class="form-label">Modèle moto :</label>
                <select name="model" id="model" class="form-control">
                <?php
                    if ($emptyresult) { ?>
                        <option value="0"><?php echo 'Aucun modèle correspondant' ?></option>
                    <?php }else {
                        while($row = $stmt->fetch())
                        { ?>
                            <option value="<?php echo $row['model_id']?>"><?php echo $row['model_name'] . ' - ' . $row['year'] ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
        </form>
    </section>
</main>

<?php require_once __DIR__ ."/layout/footer.php";