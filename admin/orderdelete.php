<?php
include "../class/cart_class.php";
$ct = new cart;
    $order_id = $_GET['orderid'];
    $delete_order = $ct -> delete_order($order_id);
    

?>
?>