<?php
class BaseController {
    protected function view($viewPath, $data) {
        require('Views/' . $viewPath . '.php');
    }
    protected function loadModel($modelPath) {
        require('Models/' . $modelPath . '.php');
    }
}
?>
