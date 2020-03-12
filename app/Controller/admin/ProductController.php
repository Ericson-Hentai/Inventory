<?php
require_once(dirname(__DIR__,1) . "/utils.php");
require_once(dirname(__DIR__,3) . "/public/config.php");
require_once(dirname(__DIR__,2) . "/Class/admin/class.product.php");

if(isset($_POST['addproductbtn']))
{
    $image = $_FILES['product_image']['name'];
    $tmp_img = $_FILES['product_image']['tmp_name'];
    $digit_random_number = mt_rand(100000, 999999);
    $newimg = $digit_random_number . $image; 
    $result = $product->addProduct($_POST, $newimg, $tmp_img);

    if($result == true){
        $_SESSION['addmessage'] = true;
        // header('Location: '.$_SERVER['REQUEST_URI']);
        redir(direction . '/public/admin/product-list.php');
        
    }else{
        $_SESSION['notaddmessage'] = true;
        // header('Location: '.$_SERVER['REQUEST_URI']);
        redir(direction . '/public/admin/product-list.php');
    }
}


if(isset($_POST['productdeleteid']))
{
    $message = $product->deleteProduct($_POST['productdeleteid']);
    echo $message;
}

if(isset($_POST['updateid']))
{
    $data = $product->getProduct($_POST['updateid']);
    echo $data;
}

if(isset($_POST['updateproductbtn']))
{
    $image = $_FILES['u_product_image']['name'];
    $tmp_img = $_FILES['u_product_image']['tmp_name'];
    $digit_random_number = mt_rand(100000, 999999);
    $newimg = $digit_random_number . $image; 
    $result = $product->updateProduct($_POST, $newimg, $tmp_img);
    //echo $result;

    if($result == true){
        $_SESSION['edidata'] = true;
        redir(direction . '/public/admin/product-list.php');
        
    }else{
        $_SESSION['noteditdata'] = true;
        redir(direction . '/public/admin/product-list.php');
    }
}


?>