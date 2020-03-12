<?php
require_once(dirname(__DIR__,2) . "/public/config.php");
require_once(dirname(__DIR__,2) . "/app/Controller/utils.php");
require_once(dirname(__DIR__,1) . "/Class/class.user.php");

if(isset($_POST['btnreguser']))
{

    unset($_SESSION['error_password'], $_SESSION['email_error'], $_SESSION['img_error']);
    $fullname = validateData($_POST['fullname']);
    $address = validateData($_POST['address']);
    $contact_no = validateData($_POST['contact_no']);
    $email = validateData($_POST['email']);
    $password = validateData($_POST['password']);
    $cpassword = validateData($_POST['confpassword']);
    $newpass = md5($password);
    $image = $_FILES['user_image']['name'];
    $tmp_img = $_FILES['user_image']['tmp_name'];
    $digit_random_number = mt_rand(100000, 999999);
    $newimg = $digit_random_number . $image; 

    if($user->checkPassword($password, $cpassword) != true)
    {
        $_SESSION['error_password'] = 'Password not Confirm!';
        redir(direction . "/public/register.php");
      
    }else{
        if($user->checkEmail($_POST['email']) == true)
        {
            $_SESSION['email_error'] = 'Email is Already use!';
            redir(direction . "/public/register.php");
        }else{
            if($user->uploadImage($tmp_img, $newimg) != true)
            {
                $_SESSION['img_error'] = 'Image cant upload!';
                redir(direction . "/public/register.php");
            }else{
                $user->registerUser($fullname, $address, $contact_no, $newimg, $email, $newpass);
            }
        }
    }
}