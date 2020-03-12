<?php

session_start();
require_once(dirname(__DIR__,1) . "/controller/utils.php");
require_once(dirname(__DIR__,2) . "/public/config.php");

class Auth {

    public function loggedIn($data)
    {
        unset($_SESSION['error']);
        $email = validateData($data['email']);
        $password = validateData($data['password']);
        $newpass = md5($password);
        DBOpen('inventorydb', '127.0.0.1');
        $query = "SELECT * FROM `user_acc` WHERE `email` = '$email' AND `password` = '$newpass' ";
        $stmt = DBGetData2($query);
        $id = $stmt[0]['id'];
        if(!empty($stmt)){
            $query2 = "SELECT * FROM `user_details` WHERE `user_id` = '$id' ";
            $stmt2 = DBGetData2($query2);
            $_SESSION['message'] = 'Successfully Login!';
            $_SESSION['user_login'] = true;
            $_SESSION['user_credentials'] = $stmt;
            $_SESSION['user_details'] = $stmt2;
            redir(direction .'/public/user/index.php');
        }else{
            $_SESSION['error'] = 'Your given credentials is wrong!';
            redir(direction .'/public/index.php');
        }
        DBClose();
    }

    public function loggedOut()
    {
        session_destroy();
        redir(direction .'/public/index.php');
    }
}

$auth = new Auth();