<?php 
class YoutubeLinkParser {
    private array $urlParse;
    public function __construct(private string $url){
        if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
            throw new InvalidUrlException();
        }

        $this->urlParse = parse_url($this->url);
    } 
}