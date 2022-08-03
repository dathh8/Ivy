<?php
include "inc/header.php";
?>
<?php
if(isset($_GET['cartid'])){
    $cart_id = $_GET['cartid'];
    $delete_cart = $ct->delete_product_cart($cart_id);
}
?>
<?php
//if(!isset($_GET['giohang_id'])){
//    echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
//}
?>
<section class="cart">
    <div class="container">
        
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
        </div> 
        <div class="container">
            <div class="cart-content row">
                <div class="cart-content-left">
                    <?php
                    //if(isset($delete_cart)){
                    //    echo $delete_cart;
                    //}
                    ?>
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>SL</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                        <tr>
                            <?php
                            $get_product_cart = $ct ->get_product_cart();
                            if($get_product_cart){
                                $sub_total=0;
                                $total_product=0;
                                while($result = $get_product_cart->fetch_assoc()){
                                    
                            ?>
                            <td><img src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt=""></td>
                            <td><?php echo $result['sanpham_tieude'] ?></td>
                            <td><img src="html_frontend/images/spcolor.png" alt=""></td>
                            <td>L</td>
                            <td ><span><?php echo $result['giohang_soluong'] ?></span></td>
                            <td><?php $total = $result['sanpham_gia']*$result['giohang_soluong']; echo $fm->format_currency($total); ?><sup>đ</sup></td>
                            <td><a href="?cartid=<?php echo $result['giohang_id'];?>"><button type="submit"><span>X</span></button></a></td>
                        </tr>
                        <?php
                        $sub_total += $total;
                        $total_product += $result['giohang_soluong'];
                        }}
                        ?>
                    </table>
                </div>
                <div class="cart-content-right">
                    <?php
                    $check_cart = $ct->check_cart();
                        if($check_cart){

                        
                    ?>
                    <table>
                        <tr>
                            <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td>TỔNG SẢN PHẨM</td>
                            
                            <td><?php echo $total_product; Session::set('total', $total_product)?></td>
                        </tr>
                        <tr>
                            <td>TỔNG TIỀN HÀNG</td>
                            
                            <td><p><?php echo $fm->format_currency($sub_total);?><sup>đ</sup></p></td>
                        </tr>
                        <tr>
                            <td>TẠM TÍNH</td>
                            <td><p style="color: black;font-weight: bold;"><?php echo $fm->format_currency($sub_total);?><sup>đ</sup></p></td>
                        </tr>
                    </table>
                    <div class="cart-content-right-text">
                        <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000 đ</p>
                        <p style="color: red;font-weight: bold;"> <span style="font-style: 8px;">
                        <?php $freeship = 2000000 - $sub_total;$freeship1= $fm->format_currency($freeship);
                        if($freeship >> 5000000){ echo "Bạn đã được miễn phí Ship";}else{ echo "Mua thêm $freeship1<sup>đ</sup> </span>để được miễn phí SHIP";}?></p>
                    </div>
                    
                    <div class="cart-content-right-button">
                        <a href="cartegory.php?carid=20"><button>TIẾP TỤC MUA SẮM</button></a>
                        <a href="delivery.php"><button>THANH TOÁN</button></a>
                    </div>
                    <div class="cart-content-right-login">
                        <p>Tài khoản IVY</p><br>
                        <?php
                        $customer_name = Session::get('customer_name');
                        $login_check = Session::get('customer_login');
                        if($login_check){
                            echo '<p>Bạn đang tích điểm từ tài khoản <span style="color: red;">'.$customer_name.'</span></p>';
                        }else{
                            echo'<p>Hãy <a href="login.php">Đăng nhập</a> tài khoản để tích diểm thành viên</p>';
                        }
                        ?>
                        
                    </div>
                    <?php
                    }else{
                        echo "<span style='color: red;font-weight: bold;'>Giỏ hàng trống, hãy mua hàng ngay bây giờ</span><br><br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "inc/footer.php";
?>