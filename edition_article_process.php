<?php 
require_once __DIR__ ."/functions/checkAuth.php";
require_once __DIR__ ."/classes/Article.php";
isAuthentified();
    
$article = new Article($_SESSION['userInfos']['id'], $_POST['type'], $_POST['title'], $_POST['content'], $_FILES['imgCover'], $_FILES['imgContent'], $_POST['video']);
?>