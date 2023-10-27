<?php

class MenuItem {
    private const CSS_ACTIVE = "'nav-link active' aria-current='page'";
    private const CSS_INACTIVE = "'nav-link'";

    // Propriétés
    private string $url;
    private string $label;
    private bool $active;

    // Méthodes
    public function __construct(
        string $url,
        string $label
    ) {
        $this->url = $url;
        $this->label = $label;
        $this->active = str_contains($_SERVER['REQUEST_URI'], $url);
    }

    public function getCssClasses(): string
    {
        return $this->active ? self::CSS_ACTIVE : self::CSS_INACTIVE;
    }
    public function getUrl(): string
    {
        return $this->url;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}