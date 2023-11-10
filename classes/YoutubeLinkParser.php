<?php 
class YoutubeLinkParser {
    private array $urlParse;
    public function __construct(private string $url){
        if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
            throw new InvalidUrlException();
        }

        $this->urlParse = parse_url($this->url);
    } 
    public function getIdLink () : string 
    {
        $urlParse = $this->urlParse;

        // if (str_contains($urlParse["path"], "watch")) {
        //     return explode('=', $urlParse["query"])[1];
        // }

        // return $urlParse["path"];

    return match ($urlParse["host"]) {
            "www.youtube.com"   => explode('=', $urlParse["query"])[1],
            "youtu.be"      => $urlParse["path"]
        };
    }
}
