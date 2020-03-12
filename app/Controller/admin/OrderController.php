<?php 

require_once(dirname(__DIR__,2) . "/Class/admin/class.order.php");



if(isset($_POST['confirmorderid']))
{
    $id = $_POST['confirmorderid'];

    $result = $order->confirm($id);

    echo $result;
}

if(isset($_POST['deliverorderid']))
{
    $id = $_POST['deliverorderid'];

    $result = $order->deliver($id);

    echo $result;
}