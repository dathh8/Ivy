<?php
include "inc/header.php";

?>
<?php
        $login_check = Session::get('customer_login');
        if($login_check){
            header('Location:payment.php');
        }
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //   var_dump($_POST,$_FILES);
   // echo '<pre>';
   // echo print_r($_POST);
   // echo '</pre>';
      $insert_client = $ct ->insert_client($_POST);
   }
   ?>

<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item">
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="delivery-top-adress delivery-top-item">
                <a href="delivery.php"><i class="fas fa-map-marker-alt"></i></a>
                </div>
                <div class="delivery-top-payment delivery-top-item">
                <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="delivery-content row">
            <div class="delivery-content-left">
                <p>Vui lòng chọn địa chỉ giao hàng</p>
                <div class="delivery-content-left-login row">
                    <i class="fas fa-sign-in-alt"></i>
                    <p><a href="login.php"><span style="font-weight: bold;"> Đăng nhập </span></a>(Nếu bạn đã có tài khoản của IVY)</p>
                </div>
                <div class="delivery-content-left-khachle row">
                    <input checked name="loaikhach" type="radio">
                    <p><span style="font-weight: bold;">Khách lẻ </span>(Nếu bạn không muốn lưu lại thông tin)</p>
                </div>
                <div class="delivery-content-left-signin row">
                    <input name="loaikhach" type="radio">
                    <p><span style="font-weight: bold;">Đăng ký </span>(Tạo mới tài khoản với thông tin bên dưới)</p>
                </div>
                <form action="" method="POST">
                <div class="delivery-content-left-input-top row">
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Họ tên<span style="color: red;">*</span></label>
                        <input required type="text" name="khachle_ten">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Điện thoại<span style="color: red;">*</span></label>
                        <input required type="text" name="khachle_sdt">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Email<span style="color: red;">*</span></label>
                        <input required type="text" name="khachle_email">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Ghi chú (với đơn hàng của bạn)<span style="color: red;">*</span></label>
                        <input type="text" name="khachle_ghichu">
                    </div>
                </div>
                <div class="delivery-content-left-input-bottom">
                    <label for="">Địa chỉ<span style="color: red;">*</span></label>
                        <input required type="text" name="khachle_diachi">
                </div>
                <div class="delivery-content-left-button row">
                    <a href="cart.php"><span>&#171;</span><p>Quay lại giỏ hàng</p></a>
                    <button type="submit"><p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p></button>
                </div>
                </form>
            </div>
            <div class="delivery-content-right">
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giảm giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                            $get_product_cart = $ct ->get_product_cart();
                            if($get_product_cart){
                                $sub_total=0;
                                $total_product=0;
                                while($result = $get_product_cart->fetch_assoc()){
                                    
                            ?>
                    <tr>
                        <td><?php echo $result['sanpham_tieude'] ?></td>
                        <td>- 0 %</td>
                        <td><?php echo $result['giohang_soluong'] ?></span></td>
                        <td><p><?php $total = $result['sanpham_gia']*$result['giohang_soluong']; echo $fm->format_currency($total); ?><sup>đ</sup></td>
                    </tr>
                    <?php
                        $sub_total += $total;
                        $total_product += $result['giohang_soluong'];
                        }}
                        ?>
                    
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng</td>
                        <td style="font-weight: bold;"><p><?php echo $fm->format_currency($sub_total);?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Thuế VAT</td>
                        <td style="font-weight: bold;"><p>1% = <?php $vat = $sub_total * 0.01;echo $fm->format_currency($vat);?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                        <td style="font-weight: bold;"><p><?php $total_payment = $sub_total += $vat;echo $fm->format_currency($total_payment) ?><sup>đ</sup></p></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
include "inc/footer.php"
?>