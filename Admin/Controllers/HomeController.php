<?php
class HomeController extends BaseController {
    public function index() {

        return $this->view('Home/index',[]);
    }

    public function show() {
        echo __METHOD__;
    } 
}
?>
