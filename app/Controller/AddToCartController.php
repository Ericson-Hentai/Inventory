<?php 

require_once(dirname(__DIR__,1) . "/Class/class.cart.php");


if(isset($_POST['addcartproductid']))
{
    $prodid = $_POST['addcartproductid'];
    $product = $cart->getProduct($prodid);

    $result = $cart->addCart($product);

    echo $result;
}

if(isset($_POST['btnupdatequantity']))
{
    $productid = $_POST['productid'];
    $quantity = $_POST['updatequantity'];
    $productrealid = $_POST['productrealid'];

    $cart->updatecart($productid,  $quantity, $productrealid);
}

if(isset($_POST['removecartproductid']))
{
    $productid = $_POST['removecartproductid'];
    $result = $cart->removeCart($productid);

    echo $result;
}

if(isset($_POST['cancelcart']))
{
    $result =  $cart->cancelCart();
    echo $result;
}

if(isset($_POST['btnorder']))
{
   $cart->finalizeOrder();
}