<?php 
session_start();
require_once __DIR__ ."/functions/checkAuth.php";
require_once __DIR__ ."/classes/Article.php";
isAuthentified();
$imgCover = $_FILES['imgCover'];
$imgContent = $_FILES['imgContent'];
$tags = isset($_POST['tags']) ? explode(',', $_POST['tags']) : [];
    
try{
    $article = new Article();
    $article->uploadArticle(
        $_SESSION['userInfos']['id'],
        $_POST['type'],
        $_POST['title'],
        $_POST['content'],
        new File ($imgCover['tmp_name']),
        new File ($imgContent['tmp_name']),
        $tags,
        $_POST['video']
    );
    $articleId = $article->getArticleId();
    Utils::redirect('edition_article_success.php?id=' . $articleId);
} catch(FailedUploadException | InvalidArticleTypeException | InvalidUrlException $e) {
    Utils::redirect('edition_article.ph?error='. $e->getCode());
} catch(Exception $e) {
    Utils::redirect('index.php?error='. $e->getMessage());
}
?>