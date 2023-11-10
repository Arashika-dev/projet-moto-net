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
        $this->userId = $userId;
        $this->typeId = $typeId;
        $this->title = $title;
        $this->textContent = $textContent;
        $this->imgCover = $imgCover;
        $this->imgContent = $imgContent;
        $this->youtubeLink = $youtubeLink;

        $filepath = 'uploads/articles/';
        $imgCover->uploadFile($filepath,'imgCover');
        $imgContent->uploadFile($filepath,'imgContent');

        $query = 'INSERT INTO article (id_user , id_type, article_title, article_text, image_cover, image_content, video_id) VALUES(:userId , :typeId, :title, :text, :imgCover, :imgContent, :video)';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue('userId', $this->userId);
        $stmt->bindValue('typeId', $this->typeId);
        $stmt->bindValue('title', $this->title);
        $stmt->bindValue('text', $this->textContent);
        $stmt->bindValue('imgCover', self::getImgCoverName());
        $stmt->bindValue('imgContent', self::getImgContentName());
        $stmt->bindValue('video', self::getYoutubeLinkId());
        $stmt->execute();
    
        $this->articleId = $pdo->lastInsertId();
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