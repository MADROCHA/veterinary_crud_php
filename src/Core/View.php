<?php

namespace App\Core;

class View {
    public function __construct(string $view, array $data) {
        require_once "src/Views/$view.php";
    }
}

?>