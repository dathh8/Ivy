<?php
include "inc/header.php";
?>

<?php
        $login_check = Session::get('customer_login');
        if($login_check==false){
            header('Location:login.php');
        }
?>
<?php
$customer_id = Session::get('customer_id');
$cs = new customer();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $update_customer = $cs->update_customer($_POST,$customer_id);
}
?>
<section class="customer">
    <div class="container">
        <div class="customer-info-top">
        <h1>Cập nhật thông tin khách hàng</h1><br>
        </div>
        <div class="customer-info">
        <form action="" method="POST">
        <table class="tbl_customer">
            <?php
            $customer_id = Session::get('customer_id');
            $get_customer = $cs->get_customer( $customer_id);
            if($get_customer){
                while($result = $get_customer->fetch_assoc()){         
            ?>
            <tr>
                <?php if(isset($update_customer)){
               echo '<td colspan="3">'.$update_customer.'</td>';
                } ?>
            </tr>
            <tr>
                <td>Tên khách hàng</td>
                <td>:</td>
                <td><input type="text" name="customer_name" value="<?php echo $result['khachhang_ten'] ?>"></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>:</td>
                <td><select name="customer_sex" id="">     
                       <option value="Nam">Nam</option>
                       <option value="Nữ">Nữ</option>
                   </select></td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>:</td>
                <td><input type="text" name="customer_date" value="<?php echo $result['khachhang_ngaysinh'] ?>"></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>:</td>
                <td><input type="text" name="customer_phone" value="<?php echo $result['khachhang_sdt'] ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $result['khachhang_email'] ?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td>:</td>
                <td><input type="text" name="customer_address" value="<?php echo $result['khachhang_diachi'] ?>"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="submit" value="Lưu"></td>
            </tr>
            <?php }} ?>
        </table>
        </form>
        </div>
    </div>

</section>

<?php
include "inc/footer.php";
?>