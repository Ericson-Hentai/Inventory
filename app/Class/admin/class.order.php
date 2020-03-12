<?php
session_start();
require_once(dirname(__DIR__,2) . "/../public/config.php");
require(util);

class Order {

        public function confirm($id)
        {
            $confirm = "confirmed";
            DBOpen('inventorydb', '127.0.0.1');
            $query = "UPDATE `orders` SET `status`='$confirm' WHERE `id` = '$id'";
            $stmt = DBExecute($query);
            DBClose();
            if($stmt){
                return json_encode(array('type' => 'success', 'message' => 'Order Confirmed!'));
            }else{
                return json_encode(array('type' => 'error', 'message' => 'Order Not Confirmed!'));
            }
        }

        public function deliver($id)
        {
            $deliver = "delivered";
            DBOpen('inventorydb', '127.0.0.1');
            $query = "UPDATE `orders` SET `status`='$deliver' WHERE `id` = '$id'";
            $stmt = DBExecute($query);
            DBClose();
            if($stmt){
                return json_encode(array('type' => 'success', 'message' => 'Order Deliver!'));
            }else{
                return json_encode(array('type' => 'error', 'message' => 'Order Not Deliver!'));
            }
        }

}

$order = new Order();