<?php
include "inc/header.php";
?>
<?php
                    $login_check = Session::get('customer_login');
                    if($login_check){
                        header('Location:customerinfo.php');
                    }
?>
<?php
$cs = new customer();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $login_customer = $cs->login_customer($_POST);
}
?>
 <secsion class="login">
        <div class="container">
            <div class="login-text">
                <h1>Đăng nhập</h1>
            </div>
            <div class="login-info row">
            <div class="login-left">
                <form action="" method="post">
                    <p style="font-weight: bold;">Đăng nhập bằng tài khoản</p><br>
                    <p>Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận những ưu đãi tốt hơn!</p><br>
                    <label for="">Email(hoặc số điện thoại của bạn)</label><br>
                    <input type="text" placeholder="Email của bạn" name="username"><br>
                    <label for="">Mật khẩu</label><br>
                    <input type="password" placeholder="Nhập mật khẩu của bạn" name="userpass"><br><br>
                    <button type="submit" name="submit">Đăng nhập</button><br>
                    <?php
                    if(isset($login_customer)){
                        echo $login_customer;
                    }
                    ?>

                </form>
            </div>
            <div class="login-right">
                <p style="font-weight: bold;" >Khách hàng mới của IVY</p><br>
                <p>Nếu bạn chưa có tài khoản trên ivymoda.com, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký.<br>

                Bằng cách cung cấp cho IVY moda thông tin chi tiết của bạn, quá trình mua hàng trên ivymoda.com sẽ là một trải nghiệm thú vị và nhanh chóng hơn!
            </p><br>
            <a href="register.php"><button>Đăng ký</button></a>
            </div>
        </div>
        </div>
    </secsion>

<?php
include "inc/footer.php";
?>