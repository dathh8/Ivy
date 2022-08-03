<?php
include "inc/header.php";

?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//if (isset($_GET['orderid']) && $_GET['orderid']=='order'){
    $customer_id = Session::get('customer_id');
    $insert_order1 = $ct->insert_order1($customer_id);
    $delcart= $ct->del_all_data_cart();
    header('location:success.php');
    }
    
?>
<?php
//if($_SERVER['REQUEST_METHOD'] == 'POST'){
//  $client_id = $_POST['khachle_id'];
//  $cart_id = $_POST['giohang_id'];
 //  var_dump($_POST,$_FILES);
   // echo '<pre>';
   // echo print_r($_POST);
   // echo '</pre>';
 //     $insert_order = $ct ->insert_order($client_id,$cart_id,$_POST);
 //  }
?>
<section class="payment">
    
    <div class="container">
        <div class="payment-top-wrap">
            <div class="delivery-top">
                <div class="payment-top-delivery payment-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="payment-top-adress payment-top-item">
                    <a href="delivery.php"><i class="fas fa-map-marker-alt"></i></a>
                </div>
                <div class="payment-top-payment payment-top-item">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
    </div>
    <div class="container">
        <form action="" method="POST">
        <div class="client_payment" hidden>
                    <?php
                    if($get_client = $ct->get_client()){
                       while($result = $get_client->fetch_assoc()) {
                        
                    ?>
                    <input type="text" name="khachle_id" value="<?php echo $result['khachle_id']?>">
                    <?php
                       }}
                    ?>
                    <?php
                            $get_product_cart = $ct ->get_product_cart();
                            if($get_product_cart){
                                while($result = $get_product_cart->fetch_assoc()){     
                            ?>
                            <input type="text" name="giohang_id" value="<?php echo $result['giohang_id']?>">
                            <?php }} ?>
                </div>
        <div class="payment-content row">
            <div class="payment-content-left">
                <div class="payment-content-left-method-delivery">
                    <p style="font-weight: bold;">Phương thức giao hàng</p>
                    <div class="payment-content-left-method-delivery-item">
                        <input checked type="radio" name="delivery-method" value="Giao hàng chuyển phát nhanh">
                        <label for="">Giao hàng chuyển phát nhanh</label>
                    </div>
                </div>
                <div class="payment-content-left-method-payment">
                    <p style="font-weight: bold;">Phương thức thanh toán</p>
                    <p>Mọi giao dịch đều được bảo mật và mã hóa.Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại</p>
                    <div class="payment-content-left-method-payment-item">
                        <input  name="method-payment" type="radio">
                        <label for="">Thanh toán thẻ tín dụng (OnePay)</label>
                    </div>
                    <div class="payment-content-left-method-payment-item-img">
                        <img src="html_frontend/images/paymentvisa.png" alt="">
                    </div>
                    <div class="payment-content-left-method-payment-item">
                        <input name="method-payment" type="radio">
                        <label for="">Thanh toán thẻ ATM (OnePay)</label>
                    </div>
                    <div class="payment-content-left-method-payment-item-img">
                        <img src="html_frontend/images/atm.png" alt="">
                    </div>
                    <div class="payment-content-left-method-payment-item">
                        <input name="method-payment" type="radio">
                        <label for="">Thanh toán Mono</label>
                    </div>
                    <div class="payment-content-left-method-payment-item-img">
                        <img src="html_frontend/images/mono.png" alt="">
                    </div>
                    <div class="payment-content-left-method-payment-item">
                        <input checked name="method-payment" type="radio" value="Thu tiền tận nơi" >
                        <label for="">Thu tiền tận nơi</label>
                    </div>
                </div>
            </div>
            <div class="payment-content-right">
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã giảm giá/Gift">
                    <button><i class="fas fa-check"></i></button>
                </div>
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã cộng tác viên">
                    <button><i class="fas fa-check"></i></button>
                </div>
                <div class="payment-content-righ-mnv">
                    <select name="" id="">
                        <option value="">Chọn mã nhân viên thân thiết</option>
                        <option value="">D345</option>
                        <option value="">B345</option>
                        <option value="">Q345</option>
                        <option value="">I345</option>
                    </select>
                </div>
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
                <table>
                    <tr>
                        <th colspan="2">Thông tin giao hàng</th>
                    </tr>
                <?php
                $customer_id = Session::get('customer_id');
                $get_customer = $cs->get_customer( $customer_id);
                if($get_customer){
                    while($result = $get_customer->fetch_assoc()){         
                ?>
                <tr>
                    <td>Tên khách hàng</td>
                    <td><?php echo $result['khachhang_ten'] ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?php echo $result['khachhang_sdt'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $result['khachhang_email'] ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?php echo $result['khachhang_diachi'] ?></td>
                </tr>
                <?php }} ?>
                </table>
            </div>
        </div>
        <div class="payment-content-righ-payment">
        <a href="?orderid=order"><button type="submit">HOÀN THÀNH</button></a>
        </div>
        </form>
    </div>
</section>
<?php
include "inc/footer.php"
?>