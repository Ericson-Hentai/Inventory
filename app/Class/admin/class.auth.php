<?php
session_start();
require_once(dirname(__DIR__,2) . "/../public/config.php");
require_once(dirname(__DIR__,2) . "/controller/utils.php");


class adminauth{
    public function auth($data)
    {
        $email = validateData($data['email']);
        $password = validateData($data['password']);
        $newpass = md5($password);
        DBOpen('inventorydb', '127.0.0.1');
        $query = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$newpass' ";
        $stmt = DBGetData2($query);
        if(!empty($stmt)){
            $_SESSION['message'] = 'Successfully Login!';
            $_SESSION['admin_login'] = true;
            $_SESSION['admin_credentials'] = $stmt;
            unset($_SESSION['error']);
            redir(direction . '/public/admin/dashboard.php');
        }else{
            $_SESSION['error'] = 'Your given credentials is wrong!';
            redir(direction . '/public/admin/index.php');
        }
        DBClose();
    }

    public function loggedOut()
    {
        session_destroy();
        redir(direction . '/public/admin/index.php');
    }
}

$auth = new adminauth();
