<?php
class ViewController {
    public static function render($view, $data = []) {
        if(is_array($data)) {
            extract($data);
        }
        
        require_once __DIR__ . '/../views/header.php';
        require_once __DIR__ . "/../views/$view.php";
        require_once __DIR__ . '/../views/footer.php';
    }
}