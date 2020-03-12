<?php 

require_once(dirname(__DIR__,1) . "/Class/class.auth.php");


if(isset($_POST['btnlogin'])) 
{  
    $auth->loggedIn($_POST);
    
}

if(isset($_POST['userinputlogout'])) 
{  
    $auth->loggedOut();
}