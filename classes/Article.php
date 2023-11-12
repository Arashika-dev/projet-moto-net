<?php 
require_once __DIR__ . "/File.php";
require_once __DIR__ ."/YoutubeLinkParser.php";
require_once __DIR__ ."/../functions/db.php";
require_once __DIR__ ."/Utils.php";
require_once __DIR__ ."/Exceptions/EmptyException.php";
require_once __DIR__ ."/Exceptions/InvalidTypeArticleException.php";
class Article
{
    private string $articleId;
    private int $userId;
    private int $typeId;
    private string $title;
    private string $textContent;
    private File $imgCover;
    private File $imgContent;
    private string $youtubeLink = '';
    private string $date;
    private array $tags = [];
    private const UPLOAD_PATH = 'uploads/articles/';
    public function __construct()
    {

    }
    public function uploadArticle(
        int $userId,
        int $typeId,
        string $title,
        string $textContent,
        File $imgCover,
        File $imgContent,
        array $tags,
        string $youtubeLink = ''
    ): void {
        if (empty($userId) || empty($typeId) || empty($title) || empty($textContent) || empty($imgCover) || empty($imgContent)) {
            throw new EmptyException();
        }

        $pdo = getConnection();
        //Verify that the typeId exists in the 'type' table.
        $verifStmt = $pdo->prepare('SELECT type_id FROM type WHERE type_id = :typeId');
        $verifStmt->execute(['typeId' => $typeId]);

        if (!$verifStmt->fetch(PDO::FETCH_ASSOC)) {
            throw new InvalidArticleTypeException();
        }
        $this->userId       = $userId;
        $this->typeId       = $typeId;
        $this->title        = $title;
        $this->textContent  = $textContent;
        $this->imgCover     = $imgCover;
        $this->imgContent   = $imgContent;
        $this->tags         = $tags;
        $this->youtubeLink  = $youtubeLink ?? '';


        $imgCover->uploadFile(self::UPLOAD_PATH, 'imgCover');
        $imgContent->uploadFile(self::UPLOAD_PATH, 'imgContent');

        $query = 'INSERT INTO article (id_user , id_type, article_title, article_text, image_cover, image_content, video_id) VALUES(:userId , :typeId, :title, :text, :imgCover, :imgContent, :video)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'userId'    => $this->userId,
            'typeId'    => $this->typeId,
            'title'     => $this->title,
            'text'      => $this->textContent,
            'imgCover'  => self::getImgCoverName(),
            'imgContent' => self::getImgContentName(),
            'video'     => self::setYoutubeLinkId()
        ]);

        $this->articleId = $pdo->lastInsertId();
        self::addTags($pdo);
    }

    public function getArticle(string $id): void
    {
        $pdo = getConnection();
        $this->articleId = $id;
        $query = 'SELECT * FROM article WHERE article_id = :id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $article = $stmt->fetch();
        self::setUserId($article['id_user']);
        self::setTypeId($article['id_type']);
        self::setTitle($article['article_title']);
        self::setTextContent($article['article_text']);
        self::setImgCover($article['image_cover']);
        self::setImgContent($article['image_content']);
        self::setYoutubeShortLink($article['video_id']);
        self::setDate($article['date_of_publication']);
        self::setTags($pdo);
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getTypeId()
    {
        return $this->typeId;
    }
    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTextContent()
    {
        return $this->textContent;
    }
    public function setTextContent(string $textContent): self
    {
        $this->textContent = $textContent;
        return $this;
    }

    public function getImgCoverName()
    {
        return $this->imgCover->getFileName();
    }
    public function setImgCover(string $imgCover): self
    {
        $this->imgCover = new File($imgCover);
        return $this;
    }

    public function getImgContentName()
    {
        return $this->imgContent->getFileName();
    }

    public function setImgContent(string $imgContent): self
    {
        $this->imgContent = new File($imgContent);
        return $this;
    }
    /**
     * Create an instance of YoutubeLinkParser and return the 'short' ID of Youtube video
     * @return string
     */
    public function setYoutubeLinkId(): string
    {
        $shortLink = new YoutubeLinkParser($this->youtubeLink);
        return $shortLink->getIdLink();
    }
    public function setYoutubeShortLink(string $youtubeLink): self
    {
        $this->youtubeLink = $youtubeLink;
        return $this;
    }

    public function getArticleId(): string
    {
        return $this->articleId;
    }

    /**
    * Return the ID to embed in the YouTube iframe.
    * @return string
    */
    public function getYoutubeShortLink(): string
    {
        return $this->youtubeLink;
    }

    public function getDate(): string
    {
        return explode(' ', $this->date)[0];
    }
    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Check if the tag already exists in the tags table. If the tag doesn't exist, add it. Insert the link between the article and the tag in the pivot table.
     *
     * @return void
     */
    public function addTags(PDO $pdo): void
    {
        foreach ($this->tags as $tagName) {

            $tagCheckStmt = $pdo->prepare("SELECT tag_id FROM tag WHERE tag_name = ?");
            $tagCheckStmt->execute([$tagName]);
            $tagId = $tagCheckStmt->fetchColumn();

            if (!$tagId) {
                $tagInsertStmt = $pdo->prepare("INSERT INTO tag (tag_name) VALUES (?)");
                $tagInsertStmt->execute([$tagName]);
                $tagId = $pdo->lastInsertId();
            }

            $linkInsertStmt = $pdo->prepare("INSERT INTO article_tag (id_article, id_tag) VALUES (?, ?)");
            $linkInsertStmt->execute([$this->articleId, $tagId]);
        }
    }
    /**
     * Gives values of tags containing the values of the tag_name column associated with the article ID.
     *
     * @param PDO $pdo
     * @return array 
     */
    public function setTags(PDO $pdo): void
    {
        $query = 'SELECT tag_name FROM tag LEFT JOIN article_tag ON tag.tag_id = article_tag.id_tag WHERE id_article = :id_article';
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id_article'=> $this->articleId]);
        $this->tags = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getTags(): array { return $this->tags; }
}