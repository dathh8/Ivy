<?php
include "inc/header.php";

?>
<?php
$cs = new customer();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $insert_customer = $cs->insert_customer($_POST);
}
?>

<!-- -------------------------register -->
<section class="register">
       <div class="container">
           <div class="register-info">
           <h1>Đăng ký tài khoản</h1><br>
           <?php
           if(isset($insert_customer)){
               echo $insert_customer;
           }
           ?>
           <form action="" method="post" name="">
               <div class="register-info-detail row">
               <div class="register-info-left">
                   <h3>Thông tin tài khoản</h3><br>
                   <div class="">
                       <p>Họ tên<span style="color: red;">*</span></p>
                       <input type="text" placeholder="Họ tên" name="customer_name">
                   </div>
                   <div class="">
                   <p>Giới tính<span style="color: red;">*</span></p>
                   <select name="customer_sex" id="">     
                       <option value="Nam">Nam</option>
                       <option value="Nữ">Nữ</option>
                   </select>
                   </div>
                   <div class="">
                       <p>Ngày sinh<span style="color: red;">*</span></p>
                       <input type="text" placeholder="ngaysinh" name="customer_date">
                   </div>
                    <div class="">
                        <p>Số điện thoại<span style="color: red;">*</span></p>
                        <input type="text" placeholder="Số điện thoại" name="customer_phone">
                    </div>
                    <div class="">
                        <p>Email<span style="color: red;">*</span></p>
                        <input type="text" placeholder="Email" name="customer_email">
                    </div>
                    <div class="">
                        <p>Địa chỉ<span style="color: red;">*</span></p>
                        <input type="text" placeholder="Địa chỉ" name="customer_address">
                    </div>
               </div>
               <div class="register-pass-right">
                   <h3>Thông tin mật khẩu</h3><br>
                   <div class="">
                    <p>Mật khẩu<span style="color: red;">*</span></p>
                    <input type="text" placeholder="Mật khẩu" name="customer_password">
                    </div>        
                    <button type="submit"  name="submit">Đăng ký</button>                               
               </div>
               
            </div>
            </div>
           </form>
           
       </div>
    </section>
    <?php
include "inc/footer.php"
?>