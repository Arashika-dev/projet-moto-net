<?php 
require_once __DIR__ ."/functions/db.php";
require_once __DIR__ ."/classes/Utils.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Utils::redirect('index.php');
}

try {
    $pdo = getConnection();

    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    $query = ("INSERT INTO model_moto (`model_name`, `id_category_moto`, `id_brand`, `year`) VALUES (:model_name, :id_category_moto, :id_brand, :year)");
    $stmtInsert = $pdo->prepare($query);
    $stmtInsert->execute([
        "model_name"        => $model,
        "id_category_moto"  => $category,
        "id_brand"          => $brand,
        "year"              => $year
    ]);

    Utils::redirect('success_add_model.php');
    
}catch(PDOException $e) {
    Utils::redirect('edition_add_model.php?error=' . $e->getMessage());    
}
?>

