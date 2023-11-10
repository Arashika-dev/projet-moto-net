<?php 
require_once __DIR__ . "/File.php";
require_once __DIR__ ."/YoutubeLinkParser.php";
require_once __DIR__ ."/../functions/db.php";
require_once __DIR__ ."/Utils.php";
require_once __DIR__ ."/Exceptions/EmptyException.php";
require_once __DIR__ ."/Exceptions/InvalidTypeArticleException.php";
class Article {
    private string $articleId;
    private int $userId;
    private int $typeId;
    private string $title;
    private string $textContent;
    private File $imgCover;
    private File $imgContent;
    private string $youtubeLink = '';
    public function __construct() {
        
    }
    public function uploadArticle (
        int $userId,
        int $typeId,
        string $title,
        string $textContent,
        File $imgCover,
        File $imgContent,
        string $youtubeLink = ''
    ):void
    {
        if (empty($userId) || empty($typeId) || empty($title) || empty($textContent) || empty($imgCover) || empty($imgContent)) {
            throw new EmptyException();
        }

        $pdo = getConnection();
        // Vérifier que le typeId existe dans la table 'type'
        $verifStmt = $pdo->prepare('SELECT type_id FROM type WHERE type_id = :typeId');
        $verifStmt->execute(['typeId' => $typeId]);

        if (!$verifStmt->fetch(PDO::FETCH_ASSOC)) {
            throw new InvalidArticleTypeException;
        }
        $this->userId       = $userId;
        $this->typeId       = $typeId;
        $this->title        = $title;
        $this->textContent  = $textContent;
        $this->imgCover     = $imgCover;
        $this->imgContent   = $imgContent;
        $this->youtubeLink  = $youtubeLink;

        $filepath = 'uploads/articles/';
        $imgCover->uploadFile($filepath,'imgCover');
        $imgContent->uploadFile($filepath,'imgContent');

        $query = 'INSERT INTO article (id_user , id_type, article_title, article_text, image_cover, image_content, video_id) VALUES(:userId , :typeId, :title, :text, :imgCover, :imgContent, :video)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'userId'    => $this->userId,
            'typeId'    => $this->typeId,
            'title'     => $this->title,
            'text'      => $this->textContent,
            'imgCover'  => self::getImgCoverName(),
            'imgContent'=> self::getImgContentName(),
            'video'     => self::getYoutubeLinkId()
        ]);
    
        $this->articleId = $pdo->lastInsertId();
    }

    public function getArticle (string $id) :void
    {
        $pdo = getConnection();
        $this->articleId = $id;
        $query = 'SELECT * FROM article WHERE article_id = :id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $article = $stmt->fetch();
        $this->userId       = $article['user_id'];
        $this->typeId       = $article['id_type'];
        $this->title        = $article['article_title'];
        $this->textContent  = $article['article_text'];
        $this->imgCover     = new File($article['image_cover']);
        $this->imgContent   = new File($article['image_content']);
        $this->youtubeLinkId = $article['video_id'] ?? '';
    }
    public function getUserId(){ return $this->userId; }

    public function getTypeId(){ return $this->typeId; }

    public function getTitle(){ return $this->title; }

    public function getTextContent(){ return $this->textContent; }

    public function getImgCoverName(){ return $this->imgCover->getFileName(); }

    public function getImgContentName(){ return $this->imgContent->getFileName(); }

    public function getYoutubeLinkId(): string { 
        $shortLink = new YoutubeLinkParser($this->youtubeLink);
        return $shortLink->getIdLink();
    }

    public function getYoutubeFullLink(): string { return $this->youtubeLink; }

    public function getArticleId(): string { return $this->articleId; }
}