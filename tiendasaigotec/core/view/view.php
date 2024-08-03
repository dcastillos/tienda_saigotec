<?php
namespace Core\view;
use Core\foundation\Application;

class View {
    public function render($viewFile) {
        return $this->getContentView($viewFile);
    }

    public function getContentView($viewFile) {
        $base_dir = Application::$base_dir;
        ob_start();
        require $base_dir . "/views/" . $viewFile . ".php";
        return ob_get_clean();
    }
}