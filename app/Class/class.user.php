<?php
session_start();
require_once(dirname(__DIR__,1) . "/controller/utils.php");
require_once(dirname(__DIR__,2) . "/public/config.php");

class User {

    public function registerUser($fullname, $address, $contactno, $newimg, $email, $newpass)
    {
            DBOpen('inventorydb', '127.0.0.1');
            $query = "INSERT INTO user_acc (email, password) 
            VALUES ('$email','$newpass')";
            $stmt = DBExecute($query);
            DBClose();
            if($stmt == true){

                
                $id = $this->getUser($email);
                $iddata = $id[0]['id'];
                if(!empty($iddata))
                {
                    DBOpen('inventorydb', '127.0.0.1');
                    $query2 = "INSERT INTO  `user_details`(`user_id`, `fullname`, `contact_no`, `address`, `image`) VALUES 
                    ('$iddata','$fullname','$contactno','$address','$newimg')";
                    $stmt2 = DBExecute($query2);
                    if($stmt2 == true){
                        $_SESSION['registersubmit'] = true;
                        redir(direction . "/public/index.php");
                    }else{
                        $_SESSION['notregistersubmit'] = true;
                        $_SESSION['POST_DATA'] = array(
                            'fullname' => $fullname,
                            'contact_no' => $contactno,
                            'address' => $address,
                            'email' => $email);
                            redir(direction . "/public/register.php");
                    }
                }
            }else{
                $_SESSION['register_error'] = 'Something Wrong!';
                redir(direction . "/public/register.php");
            }

    }

    public function getUser($email)
    {
        DBOpen('inventorydb', '127.0.0.1');
        $query = "SELECT `id` FROM `user_acc` WHERE `email` = '$email'";
        $data = DBGetData2($query);
        DBClose();
        return $data;
    }

    public function checkPassword($password, $confpassword)
    {
        if($password == $confpassword){
            return true;
        }
    }

    public function checkEmail($email)
    {
        DBOpen('inventorydb', '127.0.0.1');

        $query = "SELECT * FROM `user_acc` WHERE `email` = '$email'";
        $stmt = DBGetData2($query);
        DBClose();
        if(!empty($stmt)){
            return true;
        }else{
            return false;
        }
    }

    public function uploadImage($tmp_img, $newimg)
    {
    
        if(move_uploaded_file($tmp_img, dirname(__FILE__) . '/../../public/resources/assets/userimg/' . $newimg) == true){
            return true;
        }else {
            return false;
        }
       
    }
}

$user = new User();