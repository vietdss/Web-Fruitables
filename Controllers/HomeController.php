<?php
class HomeController extends BaseController {
    public function index() {
        $this->view('Home/index', []);
    }

}
?>
