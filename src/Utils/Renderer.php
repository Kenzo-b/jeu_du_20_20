<?php

namespace kenzo\Jeu20\utils;

class Renderer {

    function __construct(private string $view, private ?array $params){}


    /**
     * Render the current view.
     */
    public function render(): string
    {
        $viewPath = BASE_VIEW_PATH . $this->view . ".php";

        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: " . $viewPath);
        }
        extract($this->params);
        ob_start();
        require $viewPath;
        return ob_get_clean();
    }

    /**
     * Static method instantiate Renderer object and render it.
     */
    public static function renderView(string $view, ?array $params): string
    {
        $renderer = new self($view, $params);
        return $renderer->render();
    }
}