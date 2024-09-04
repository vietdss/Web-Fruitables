<?php
class BaseController {
    protected function view($viewPath, $data) {
        require('../Admin/Views/' . $viewPath . '.php');
    }

    protected function loadModel($modelPath) {
        require('../Models/' . $modelPath . '.php');
    }
}
?>
