<?php
session_start();
require_once(dirname(__DIR__,2) . "/public/config.php");
require(util);


class Cart {

    public function __construct()
    {
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array(); 
            $_SESSION['proID'] = 0;
        }
    }

    public function getProduct($id)
    {
        DBOpen('inventorydb', '127.0.0.1');
        $query2 = "SELECT * FROM `product` WHERE `id` = '$id'";
        $data = DBGetData2($query2);
        DBClose();
        return $data;
    }

    public function addCart($data)
    {
        $cart = array(
            'id' => $data[0]['id'],
            'proID' => $_SESSION['proID'],
            'productname' => $data[0]['product_name'],
            'productimage' => $data[0]['image'],
            'price' => $data[0]['price'],
            'qty' => 1
        );

        $_SESSION['proID'] = $_SESSION['proID'] + 1;
        array_push($_SESSION['cart'],$cart); 
        
        return json_encode(array('type' => 'success', 'message' => 'Add To Cart Complete!'));
    }

    public function updatecart($productid, $quantity, $productrealid)
    {
        $_SESSION['cart'][$productid]['qty'] = $quantity;
        redir(direction . "/public/user/cart.php");
    }

    public function minsuQuantity($id)
    {

    }

    public function removeCart($productid)
    {
        unset($_SESSION['cart'][$productid]);
        if(empty($_SESSION['cart']))
        {
            unset($_SESSION['cart']);
        }
        return json_encode(array('type' => 'success', 'message' => 'Remove Product To Cart Complete!'));
    }

    public function cancelCart()
    {
        unset($_SESSION['cart']);
        return json_encode(array('type' => 'success', 'message' => 'Cancel All Product in Cart Complete!'));
    }

    public function finalizeOrder()
    {
        $item = '';
        foreach($_SESSION['cart'] as $row){
            if($row['qty'] != 0){
                $product = '('.$row['qty'].') '.$row['productname'];
                $item = $product.', '.$item;
            }
        }
        $userid = $_SESSION['user_details'][0]['id'];
        $fullname = $_SESSION['user_details'][0]['fullname'];
        $date = date('m/d/y h:i:s A');
        $status = "unconfirmed";
        $totatlprice = $_SESSION['totalprice'];
        DBOpen('inventorydb', '127.0.0.1');
        $query = "INSERT INTO `orders`(`user_id`, `fullname`, `item`, `total_price`, `status`, `date_ordered`) 
        VALUES ('$userid','$fullname','$item','$totatlprice','$status', '$date')";
        $stmt = DBExecute($query);
        DBClose();

        if($stmt == true){
            unset($_SESSION['cart']);
            $_SESSION['ordercomplete'] = true;
            redir(direction . "/public/user/order-history.php");
        }else{
            $_SESSION['ordernotcomplete'] = true;
            redir(direction . "/public/user/cart.php");
        }
    }

}

$cart = new Cart();