<?php

class Order extends BaseModel
{
    const TABLE = 'orders';

    public function createNewOrder()
    {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $companyName = $_POST['companyName'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postCode = $_POST['postCode'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $orderStatus = $_POST['orderStatus'];

        
        // Insert order details
        $sql = "INSERT INTO `orders` (ShipAddress)
                VALUES ('$firstName')";
        $this->conn->query($sql);
        // $cartItems = $_POST['cartItems'];

       

        // $orderId = $this->conn->insert_id;

        // // Insert order items into order_items table
        // foreach ($cartItems as $item) {
        //     $ProductID = $item['id'];
        //     $Quantity = $item['quantity'];
        //     $Image = $item['image'];
        //     $sql = "INSERT INTO order_details (OrderID, ProductID, Quantity) VALUES ('$orderId', '$ProductID', '$Quantity','$Image')";
        //     $this->conn->query($sql);
        // }
    }
}
