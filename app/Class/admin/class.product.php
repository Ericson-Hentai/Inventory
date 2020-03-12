<?php
session_start();
require_once(dirname(__DIR__,2) . "/controller/utils.php");

class Product{

    public function addProduct($data, $image, $tmpimage)
    {
        $product_name = validateData($data['product_name']);
        $product_desc = validateData($data['product_desc']);
        $price = validateData($data['price']);
        $quantity = validateData($data['quantity']);

        if($this->uploadImage($image, $tmpimage) == true)
        {
            DBOpen('inventorydb', '127.0.0.1');
            $query = "INSERT INTO product(product_name, product_desc, price, quantity, image) 
            VALUES ('$product_name', '$product_desc','$price','$quantity','$image')";
            $stmt = DBExecute($query);
            if($stmt == true){
                return true;
            }else{
                return false;
            }
            DBClose();
        }else{
            return false;
        }
    }

    public function uploadImage($image, $tmpimage)
    {
        if(move_uploaded_file($tmpimage, dirname(__FILE__) . '/../../../public/resources/assets/productimg/' . $image) == true){
            return true;
        }else{
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $imagedata = $this->getUserImage($id);
        unlink(dirname(__FILE__) . '/../../../public/resources/assets/productimg/' . $imagedata[0]['image']);
        DBOpen('inventorydb', '127.0.0.1');
        $query = "DELETE FROM `product` WHERE `id` = '$id'";
        $stmt = DBExecute($query);
        DBClose();
        if($stmt){
            return json_encode(array('type' => 'success', 'message' => 'Product delete!'));
        }else{
            return json_encode(array('type' => 'error', 'message' => 'Product not delete!'));
        }
    }

    public function getProduct($id)
    {
        DBOpen('inventorydb', '127.0.0.1');
        $query2 = "SELECT * FROM `product` WHERE `id` = '$id'";
        $data = DBGetData2($query2);
        DBClose();
        return json_encode($data);
    }

    public function getUserImage($id)
    {
        DBOpen('inventorydb', '127.0.0.1');
        $query2 = "SELECT `image` FROM `product` WHERE `id` = '$id'";
        $image = DBGetData2($query2);
        DBClose();
        return $image;
    }

    public function updateProduct($data, $image, $tmpimage)
    {
        $id = validateData($data['u_product_id']);
        $product_name = validateData($data['u_product_name']);
        $product_desc = validateData($data['u_product_desc']);
        $price = validateData($data['u_price']);
        $quantity = validateData($data['u_quantity']);
        $imagedata = $this->getUserImage($id);
            DBOpen('inventorydb', '127.0.0.1');
            $query = "UPDATE `product` SET `product_name`= '$product_name', `product_desc` = '$product_desc', `price` = '$price'  
            , `quantity` = '$quantity', `image` = '$image' WHERE `id` = '$id' ";
            $stmt = DBExecute($query);
            unlink(dirname(__FILE__) . '/../../../public/resources/assets/productimg/' . $imagedata[0]['image']);
            DBClose();
            if($stmt){
                // $this->uploadImage($image, $tmpimage);
                move_uploaded_file($tmpimage, dirname(__FILE__) . '/../../../public/resources/assets/productimg/' . $image);
                
                

               return true;
    
            }else{
                return false;
                // $_SESSION['POST_DATA'] = array(
                //     'id' => $id,
                //     'fullname' => $fullname,
                //     'email' => $email);
                // redir("../../../../user.php");
            }
    }


}

$product = new Product();

?>