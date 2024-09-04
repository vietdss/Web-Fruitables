<?php
class CheckoutController extends BaseController {
    public function index() {
        $this->loadModel('Order');
        $orderModel = new Order;
        $this->loadModel('Cart');
        $cartModel = new Cart;
        $this->view('Checkout/index', ['cart_items'=>$cartModel->getCartItems()]);
 
        if(isset($_POST['submit'])){
            $orderModel->createNewOrder();
        }
    }
    public function buy() {
      
    }

}
?>
