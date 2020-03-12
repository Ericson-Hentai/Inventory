<?php 

require_once(dirname(__DIR__,2) . "/Class/admin/class.auth.php");

if(isset($_POST['btnadminlogin']))
{
    $auth->auth($_POST);
}

if(isset($_POST['admininputlogout']))
{
    $auth->loggedOut();
}