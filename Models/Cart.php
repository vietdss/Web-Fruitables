<?php

class Cart extends BaseModel
{
    const TABLE = 'cart_items';
    public $cartId;

    public function __construct()
    {
        parent::__construct(); // Assuming the BaseModel constructor initializes $this->conn

        if (isset($_SESSION['UserID'])) {
            $sql = "SELECT Id FROM `cart` WHERE UserId='$_SESSION[UserID]'";
            $result = $this->conn->query($sql);

            // Check if the query returned a result
            if ($result->num_rows > 0) {
                // Fetch the CartId from the result
                $row = $result->fetch_assoc();
                $this->cartId = $row['Id'];
            } else {
                // Create a new cart if not found
                $this->cartId = $this->createNewCart();
            }
        } else {
            // Handle case where user is not logged in
            throw new Exception("User is not logged in.");
        }
    }

    public function getCartItems()
    {
        $cartId = $this->cartId;

        $sql = "SELECT cart_items.Id, Image, ProductName, products.Quantity AS StockQuantity, Price, cart_items.Quantity 
                FROM `cart_items` 
                INNER JOIN `products` ON cart_items.ProductId = products.Id 
                WHERE cart_items.CartId = '$cartId'";
        $result = $this->conn->query($sql);
        return $result;
    }

    private function createNewCart()
    {
        // Create a new cart and return its ID
        $sql = "INSERT INTO cart (UserId) VALUES ('$_SESSION[UserID]')";
        $this->conn->query($sql);
        return $this->conn->insert_id; // Return the newly created cart_id
    }

    public function addToCart()
    {
        if (empty($this->cartId)) {
            // Assume you have a method to create a new cart and get the cart_id
            $newCartId = $this->createNewCart();
            $this->cartId = $newCartId;
        }

        $data = [
            'CartId' => $this->cartId,
            'ProductId' => $_POST['ProductId'],
            'Quantity' => $_POST['Quantity']
        ];

        // Check if the product already exists in the cart
        $sql = "SELECT * FROM " . self::TABLE . " WHERE CartId = '{$data['CartId']}' AND ProductId = '{$data['ProductId']}'";
        $result = $this->conn->query($sql);
        $cartItem = $result->fetch_assoc();

        if ($cartItem) {
            // If the product already exists in the cart, update the quantity
            $newQuantity = $cartItem['Quantity'] + $data['Quantity'];
            $updateData = [
                'Quantity' => $newQuantity
            ];
            $this->edit(self::TABLE, $updateData, $cartItem['Id']);
        } else {
            // If the product is not in the cart, add it
            $this->add(self::TABLE, $data);
        }
    }

    public function updateCartItem()
    {
        $data = [
            'Quantity' => $_POST['Quantity']
        ];
        $id = $_POST['id'];
        $this->edit(self::TABLE, $data, $id);
    }

    public function removeFromCart()
    {
        $id = $_GET['id'];
        $this->delete(self::TABLE, $id);
    }

    public function clearCart()
    {
        $sql = "DELETE FROM " . self::TABLE . " WHERE CartId = '$this->cartId'";
        $this->conn->query($sql);
    }
    public function getRowCount()
    {
        $sql = "SELECT COUNT(*) as rowCount FROM " . self::TABLE . " WHERE CartId = '$this->cartId'";
        $result = $this->conn->query($sql);
        
        return $result->num_rows ?? 0; // Trả về 0 nếu giỏ hàng không có hàng nào
    }
}
