<?php
require_once __DIR__ ."/../classes/MenuItem.php";

$menuItemsLeft = [
    new MenuItem("index.php", "Accueil"),
    new MenuItem("articles.php","Articles"),
    new MenuItem("annonces.php","Occasions"),
];

$menuItemsRight = [
    new MenuItem("register.php","Inscription"),
    new MenuItem("login.php","Connexion")
    ];

$menusItemsAdmin = [];

if (isset($_SESSION['userInfos'])){
    $menusItemsRightAuth = [
    new MenuItem("profile.php",$_SESSION['userInfos']['pseudo']),
    new MenuItem("logout.php","Déconnexion")
    ];

    if($_SESSION["userInfos"]["is_admin"] == 1) {
        $menusItemsAdmin = [
            new MenuItem ('edition_article.php', 'Editer')
        ];
    }
}


?>

<nav class="navbar navbar-expand-lg bg-warning bg-opacity-50">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Logo" width="120px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav d-flex justify-content-lg-between w-100">
                <div class="d-flex flex-column flex-lg-row">
                    <?php foreach ($menuItemsLeft as $item) { ?>
                    
                        <a class= <?php echo $item->getCssClasses() ?> href="<?php echo $item->getUrl() ?>"><?php echo $item->getLabel() ?></a>
                    
                    <?php } ?>
                </div>
                <div class="d-flex flex-column flex-lg-row">
                        <?php 
                            foreach ($menusItemsAdmin as $item) {?>
                            <a class= <?php echo $item->getCssClasses() ?> href="<?php echo $item->getUrl() ?>"><?php echo $item->getLabel() ?></a>
                            <?php }
                            

                        if(!isset($_SESSION["userInfos"])) {
                            foreach ($menuItemsRight as $item) { ?>
                                <a class= <?php echo $item->getCssClasses() ?> href="<?php echo $item->getUrl() ?>"><?php echo $item->getLabel() ?></a>
                        <?php }
                            }else {
                                foreach ($menusItemsRightAuth as $item) { ?>
                                    <a class= <?php echo $item->getCssClasses() ?> href="<?php echo $item->getUrl() ?>"><?php echo $item->getLabel() ?></a>
                            <?php }
                            } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>