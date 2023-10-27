<?php
require_once __DIR__ ."/../classes/MenuItem.php";

$menuItems = [
    new MenuItem("index.php", "Accueil"),
    new MenuItem("article.php","Articles"),
    new MenuItem("annonces.php","Occasions"),
];
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Logo" width="120px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
                    <?php foreach ($menuItems as $item) { ?>
                    
                        <a class= <?php echo $item->getCssClasses() ?> href="<?php echo $item->getUrl() ?>"><?php echo $item->getLabel() ?></a>
                    
                    <?php } ?>
                </div>
        </div>
    </div>
</nav>