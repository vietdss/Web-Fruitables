<?php
class ProductController extends BaseController
{
    public function index()
    {

        $this->loadModel('Product');
        $productModel = new Product;
        $this->view('Product/index', ['products' => $productModel->getAllProducts()]);
    }

    public function add()
    {

        $this->loadModel('Category');
        $categoryModel = new Category;
        $this->loadModel('Product');
        $productModel = new Product;
        $this->view('Product/add', ['categories' => $categoryModel->getAllCategories()]);
        if (isset($_POST["submit"])) {

            $productModel->addProduct();
        }
    }
    public function edit()
    {
        $this->loadModel('Category');
        $categoryModel = new Category;
        $this->loadModel('Product');
        $productModel = new Product;
        $this->view('Product/edit', ['categories' => $categoryModel->getAllCategories(), 'product' => $productModel->getProductById()]);
        if (isset($_POST["submit"])) {

            $productModel->editProduct();
        }
    }
    public function delete()
    {
        $this->loadModel('Product');
        $productModel = new Product;
        $productModel->deleteProduct();
    }
}
