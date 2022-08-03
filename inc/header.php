<?php
include 'lib/session.php';
Session::init();
ob_start();
//$filepath = realpath(dirname(__FILE__));
//include $filepath."class/cartegory_class.php";
//include "html_backend/class/brand_class.php";
?>
<?php
    include_once 'lib/database.php';
    include_once 'helper/format.php';
    include_once 'class/customer_class.php';
 //   require_once __DIR__ . '/autoload.php';
//    include_once 'class/adminlogin.php';
//    include_once 'class/brand_class.php';
    include_once 'class/cart_class.php';
    include_once 'class/cartegory_class.php';
//    include_once 'class/color_class.php';
    include_once 'class/product_class.php';
     include_once 'class/user_class.php';
//    spl_autoload_register(function($classname){
 //       include_once "class/".$classname.".php";
 //   });
 //   spl_autoload_register(function($className) {
  //  include_once "class/.$className . '.php'";
 //   });
    $db = new Database();
    $fm = new Format();
    $ct = new cart();
    $us = new user();
    $cat = new cartegory();
    $product = new product();
    $cs = new customer();
?>

<?php
$cartegory = new cartegory();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="html_frontend/css/style.css">
    <title>Website - Ivy</title>
</head>
<body>
    <secsion class="top">
        <div class="container">
            <div class="row">
                <div class="top-logo">
                    <a href="index.php"><img src="html_frontend/images/logo.png" alt=""></a>      
                </div>
                <div class="top-menu-items">
                    <ul>
                        <?php
                            if($show_cartegory_nu = $cartegory->show_cartegory_nu()){$i=0;
                           while($result = $show_cartegory_nu->fetch_assoc()) {$i++;
                        ?>
                        <li><?php echo $result['danhmuc_ten']?>
                            <ul class="top-menu-item">
                                <?php
                                if($show_brand_nu = $cartegory->show_brand_nu()){$i=0;
                                while($resultB = $show_brand_nu->fetch_assoc()) {$i++;
                                ?>
                               <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                <?php }} ?> 
                            </ul></a>
                        </li>
                        <?php }} ?>
                        <?php
                            if($show_cartegory_nam = $cartegory->show_cartegory_nam()){$i=0;
                           while($result = $show_cartegory_nam->fetch_assoc()) {$i++;
                            ?>
                            <li><?php echo $result['danhmuc_ten']?>
                                <ul class="top-menu-item">
                                    <?php
                                    if($show_brand_nam = $cartegory->show_brand_nam()){$i=0;
                                    while($resultB = $show_brand_nam->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                                </ul></a>
                            </li>
                            <?php }} ?>
                        <?php
                            if($show_cartegory_treem = $cartegory->show_cartegory_treem()){$i=0;
                           while($result = $show_cartegory_treem->fetch_assoc()) {$i++;
                            ?>
                            <li><?php echo $result['danhmuc_ten']?>
                                <ul class="top-menu-item">
                                    <?php
                                    if($show_brand_treem = $cartegory->show_brand_treem()){$i=0;
                                    while($resultB = $show_brand_treem->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                                </ul></a>
                            </li>
                            <?php }} ?>
                        <?php
                            if($show_cartegory_sale = $cartegory->show_cartegory_sale()){$i=0;
                           while($result = $show_cartegory_sale->fetch_assoc()) {$i++;
                            ?>
                            <li><?php echo $result['danhmuc_ten']?>
                                <ul class="top-menu-item">
                                    <?php
                                    if($show_brand_sale = $cartegory->show_brand_sale()){$i=0;
                                    while($resultB = $show_brand_sale->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                                </ul></a>
                            </li>
                            <?php }} ?>
                        <?php
                            if($show_cartegory_dacbiet = $cartegory->show_cartegory_dacbiet()){$i=0;
                           while($result = $show_cartegory_dacbiet->fetch_assoc()) {$i++;
                            ?>
                            <li><?php echo $result['danhmuc_ten']?>
                                <ul class="top-menu-item">
                                    <?php
                                    if($show_brand_dacbiet = $cartegory->show_brand_dacbiet()){$i=0;
                                    while($resultB = $show_brand_dacbiet->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                                </ul></a>
                            </li>
                            <?php }} ?>
                        <?php
                            if($show_cartegory_bosuutap = $cartegory->show_cartegory_bosuutap()){$i=0;
                           while($result = $show_cartegory_bosuutap->fetch_assoc()) {$i++;
                            ?>
                            <li><?php echo $result['danhmuc_ten']?>
                                <ul class="top-menu-item">
                                    <?php
                                    if($show_brand_bosuutap = $cartegory->show_brand_bosuutap()){$i=0;
                                    while($resultB = $show_brand_bosuutap->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                                </ul></a>
                            </li>
                            <?php }} ?>
                        <?php
                            if($show_cartegory_tintuc = $cartegory->show_cartegory_tintuc()){$i=0;
                           while($result = $show_cartegory_tintuc->fetch_assoc()) {$i++;
                            ?>
                            <li><?php echo $result['danhmuc_ten']?>
                                <ul class="top-menu-item">
                                    <?php
                                    if($show_brand_tintuc = $cartegory->show_brand_tintuc()){$i=0;
                                    while($resultB = $show_brand_tintuc->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                                </ul></a>
                            </li>
                            <?php }} ?>
                        <?php
                            if($show_cartegory_thongtin = $cartegory->show_cartegory_thongtin()){$i=0;
                           while($result = $show_cartegory_thongtin->fetch_assoc()) {$i++;
                            ?>
                            <li><?php echo $result['danhmuc_ten']?>
                                <ul class="top-menu-item">
                                    <?php
                                    if($show_brand_thongtin = $cartegory->show_brand_thongtin()){$i=0;
                                    while($resultB = $show_brand_thongtin->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                                </ul></a>
                            </li>
                            <?php }} ?>
                        
                    </ul>
                </div>
                <div class="top-menu-icons">
                    <ul>
                        <li>
                            <form action="categorysearch.php" method="GET">
                            <input type="text" placeholder="Tìm kiếm" name="search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        </li>
                        <?php
                        if(isset($_GET['customerid'])){
                            $delcart= $ct->del_all_data_cart();
                            Session::destroy();
                        }
                        ?>
                            <?php
                            $login_check = Session::get('customer_login');
                            if($login_check==false){
                                echo ' <li>
                                <a href=""><i class="fas fa-box"></i></a>
                            </li>
                            <li><a href="login.php"><i class="fas fa-user"></i></a></li>';
                            }else{
                                echo '<li>
                                <a href="login.php"><i class="fas fa-user"></i></a>
                            </li>
                            <li><a href="?customerid='.Session::get('customer_id').'"><p>Logout</p></a></li>';
                            }
                            ?>
                            
                        
                        <li>
                            <a href="cart.php"><i class="fas fa-shopping-cart"><?php $total = Session::get("total");echo $total;?></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </secsion>