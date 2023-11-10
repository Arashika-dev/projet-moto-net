<?php 
require_once __DIR__ . "/File.php";
require_once __DIR__ ."/YoutubeLinkParser.php";
require_once __DIR__ ."/../functions/db.php";
class Article {
    
    public function __construct(
        private int $userId,
        private int $typeId,
        private string $title,
        private string $textContent,
        private File $imgCover,
        private File $imgContent,
        private string $youtubeLink = null
    ) {
        if (empty($this->userId) || empty($this->typeId) || empty($this->title) || empty($this->textContent) || empty($this->imgCover) || empty($this->imgContent)) {
            throw new EmptyException();
        }

        $pdo = getConnection();
        // Vérifier que le typeId existe dans la table 'type'
        $stmt = $pdo->prepare('SELECT type_id FROM type WHERE type_id = :typeId');
        $stmt->bindValue('typeId', $this->typeId);
        $stmt->execute();

        if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
            throw new InvalidArgumentException("Le type d'article n'est pas valide.");
    }
    }
        public function uploadArticle ():void
        {
            $pdo = getConnection();
            $filepath = 'uploads/articles/';
            $this->imgCover->uploadFile($filepath,'imgCover');
            $this->imgContent->uploadFile($filepath,'imgContent');

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
}