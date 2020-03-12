<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$now = new DateTime('NOW', new DateTimeZone('Asia/Singapore'));
$maniladate = $now->format("Y-m-d");
$manilatime = $now->format("H:i:s");
$manilanow = "$maniladate $manilatime";
$conn = null;
define("c", ",");
define("breakdown", "</br>");


$servername = "localhost";
$username = "root";
$password = "";
// $db = "account";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE account";
if (mysqli_query($conn, $sql)) 
{
  header('login.php'); 
} 
else
{
  header('nodatabase.php');
}

mysqli_close($conn);

function wrInput($name, $value, $type, $placeholder) {
 if ($type == "") $type = "text";
 wr("<input type='$type' id='$name' name='$name' class='form-control' autocomplete='off' placeholder='$placeholder' value='$value'>");
}

function wrInput2($name, $value, $type, $placeholder) {
 if ($type == "") $type = "text";
 wr("<input type='$type' id='$name' name='$name' class='form-control' autocomplete='off' placeholder='$placeholder' value='$value' readonly> ");
}



function left($str, $length) {
 return substr($str, 0, $length);
}

function right($str, $length) {
 return substr($str, -$length);
}

function cleanMobile($m) {
 $m = trim($m);
 $m = str_replace("-","",$m);
 $m = str_replace("(","",$m);
 $m = str_replace(")","",$m);
 $m = str_replace(".","",$m);
 $m = str_replace(" ","",$m);
 $m = str_replace("+","",$m);
 if (left($m,3) == "639") $m = "09" . right($m,9);
 if (left($m,1) == "9" && strlen($m) == 10) $m = "0" . $m;
 return $m;
}

function validateData($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function DBOpen($DBName, $host) 
{

  if($DBName == null && $host == null)
  {
    global $conn;

    try 
    {
      $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=account;','root','');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  else
  {
    global $conn;

    try 
    {
      $conn = new PDO('mysql:host='.$host.';port=3306;dbname='.$DBName.';','root','');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
  }

}



function dump($d) {
 echo "<pre>";
 var_dump($d);
 echo "</pre>";
 die();
}

function DBExecute($query) {
 ini_set('max_execution_time', 1200);
 global $conn;
 $conn->query($query);
 return true; // no Oracle support
}

function DBGetData($query) {
 global $conn;
 $stmt = $conn->query($query);
 $stmt->setFetchMode(PDO::FETCH_NUM); // NUM ASSOC BOTH
 return $stmt->fetchAll();
}


function DBGetData2($query) {
 global $conn;
 $stmt = $conn->query($query);
 $stmt->setFetchMode(PDO::FETCH_ASSOC); // NUM ASSOC BOTH
 return $stmt->fetchAll();
}

function DBClose() {
 global $conn;
 $conn = null;
}

function SQLs($val) {
 if ($val == null)
  return "NULL";
else
  return "'" . str_replace("'", "''", $val) . "'";
}

$encryption_key = base64_decode("eHchxwVMq6OsNkNCZhgkVrueDZlMlOq/PipelybDli4=");
// $encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));
function encode($data) {
 global $encryption_key;
 return openssl_encrypt($data, 'aes-256-cbc', $encryption_key); //, 0, $iv);
}

function decode($data) {
 global $encryption_key;
 return openssl_decrypt($data, 'aes-256-cbc', $encryption_key); // , 0, $iv);
}

function wr($string) {
 echo $string;
 ob_flush();
 flush();  
}

function match($a, $b, $c) {
 if ($a == $b) return $c;
}

function matchin($haystack, $needle, $c) {
 if (stripos($haystack,$needle) === false)
  return "";
else
  return $c;
}

function redir($url) {
 header("Location: $url");
 exit();
}

function redirMsg($url, $msg) {
 $frm = '<form id="myForm" action="'.$url.'" method="post">
 <input type="hidden" name="msg" value="'.htmlentities($msg).'">
 </form><script>document.getElementById("myForm").submit();</script>';
 die($frm);
}

function redirWithMessageSuccess($url,$msg,$count){
  $Message = $msg;
  setcookie("Success", $Message, strtotime( '+'.$count.' second' ));
  
  header("Location:$url");
  exit();
}
function redirWithMessageError($url,$msg,$count){
  $Message = $msg;
  setcookie("Error", $Message, strtotime( '+1 second' ));
  header("Location:$url");
  exit();
}

function decryptRJ256($string_to_decrypt){
 $key = 'lkirwf897+22#bbtrm8814z5qq=498j5';
 $iv = '741952hheeyy66#cs!9hjv887mxx7@8y';
 $string_to_decrypt = base64_decode($string_to_decrypt);
 $rtn = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $string_to_decrypt, MCRYPT_MODE_CBC, $iv);
 $rtn = rtrim($rtn, "\4");
 return($rtn);
}

function encryptRJ256($string_to_encrypt) {
  $key = 'lkirwf897+22#bbtrm8814z5qq=498j5';
  $iv = '741952hheeyy66#cs!9hjv887mxx7@8y';

  $rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string_to_encrypt, MCRYPT_MODE_CBC, $iv);

  $rtn = base64_encode($rtn);

  return($rtn);
}

function _redirect($url, $message, $message_type){

  $_SESSION['sess_flash_message']= array();
  if($message){
    switch($message_type){ 
      case 'success': $_SESSION['sess_flash_message'][] = '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>'.$message.'</div>';break;
      case 'error': $_SESSION['sess_flash_message'][] = '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button>'.$message.'</div>';break;
      case 'notice': $_SESSION['sess_flash_message'][] = '<div class="alert alert-info"><button data-dismiss="alert" class="close" type="button">×</button>'.$message.'</div>';break;
      case 'warning': $_SESSION['sess_flash_message'][] = '<div class="alert alert-block"><button data-dismiss="alert" class="close" type="button">×</button>'.$message.'</div>';break;
      default: $_SESSION['sess_flash_message'][] = $message;
    }
  }
  if($url) {
    header("Location: ".$url);
  } else {
    header("Location: ".$_SERVER['HTTP_REFERER']);
  }
  exit();
  ob_flush();    
}

?>