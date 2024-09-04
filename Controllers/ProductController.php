<?php
class ProductController extends BaseController {
    public function index() {
        $this->loadModel('Product');
        $productModel = new Product;
        $this->view('Product/index', ['products'=>$productModel->getAllProducts()]);
    }

    public function detail() {
        $this->loadModel('Category');
        $categoryModel = new Category;
        $this->loadModel('Product');
        $productModel = new Product;
      
        $this->view('Product/detail', ['categories' => $categoryModel->getAllCategories(), 'product' => $productModel->getProductById()]);    
    } 
    public function addToCart() {
        
            $this->loadModel('Cart');
            $cartModel = new Cart;

            $cartModel->addToCart();

        
    }
}
?>
