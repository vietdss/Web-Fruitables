<?php
class CartController extends BaseController {
    public function index() {
        $this->loadModel('Cart');
        $cartModel = new Cart;
        $this->view('Cart/index', ['cart_items'=>$cartModel->getCartItems(),'q'=>$cartModel->getRowCount()]);
    }
    public function delete(){
        $this->loadModel('Cart');
        $cartModel = new Cart;
        $cartModel->removeFromCart();
    }
}
?>
