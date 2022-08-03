<?php
include "../class/cart_class.php";
$ct = new cart;
    $order_id = $_GET['orderid'];
    $update_order = $ct -> update_order($order_id);
    

?>
?>