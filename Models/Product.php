<?php


class Product extends BaseModel
{
    const TABLE = 'products';

    public function getAllProducts()
    {
        return $this->getAll(self::TABLE);
    }
    public function getProductById()
    {
        $id = $_GET['id'];
        return $this->getById(self::TABLE,$id);
    }
    public function addProduct()
    {
        $data = [
            'ProductName' => $_POST['ProductName'],
            'CategoryId' => $_POST['CategoryId'],
            'Price' => $_POST['Price'],
            'Quantity' => $_POST['Quantity'],
            'Description' => $_POST['Description'],
        ];
        $file = $_FILES['Image'];
        $this->add(self::TABLE, $data, $file);
    }
    public function editProduct()
    {
        $data = [
            'ProductName' => $_POST['ProductName'],
            'CategoryId' => $_POST['CategoryId'],
            'Price' => $_POST['Price'],
            'Quantity' => $_POST['Quantity'],
            'Description' => $_POST['Description'],
        ];
        $file = $_FILES['Image'];
        $id = $_GET['id'];
        $this->edit(self::TABLE, $data, $id , $file);
    }
    public function deleteProduct(){
        $id = $_GET['id'];
        return $this->delete(self::TABLE,$id);
    }
}
