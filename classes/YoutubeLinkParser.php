<?php 
require_once __DIR__ ."/Exceptions/InvalidUrlException.php";
class YoutubeLinkParser {
    private array $urlParse;

    public function __construct(private string $url) {
        // Vérifier si la chaîne est vide avant de valider l'URL
        if (!empty($this->url)) {
            if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
                throw new InvalidUrlException();
            }

            $this->urlParse = parse_url($this->url);
        }
    }

    public function getIdLink(): string {
        switch ($this->urlParse["host"]) {
            case "www.youtube.com":
                parse_str(parse_url($this->url, PHP_URL_QUERY), $query);
                return $query['v'];

            case "youtu.be":
                $path = preg_replace('/^\/|(\?.*)/', '', $this->urlParse["path"]);
                return $path;

            default:
                return '';
        }
    }
}
