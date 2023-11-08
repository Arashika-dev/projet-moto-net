<?php require_once __DIR__ . '/layout/header.php';

$_SESSION['articleInfos'] = [
    'model'=> $_POST['model'],
];

?>

<main>
    <div class="container">
        <h1 class="text-center">Rédaction</h1>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="border rounded p-2">
                    <form action="">
                        <div class="col-8 offset-2">
                            <label for="title" class="form-label">Titre de l'article :</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="col-8 offset-2">
                            <label for="" class="form-label" ></label>
                            <input type="text" class="form-control" name="" id="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require_once __DIR__ . '/layout/footer.php';