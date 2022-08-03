<?php
include "../class/color_class.php";
$color = new color;
    $color_id = $_GET['mau_id'];
    $delete_color = $color -> delete_color($color_id);
    

?>
?>