<?php
include "inc/header.php";
?>

<?php
        $login_check = Session::get('customer_login');
        if($login_check==false){
            header('Location:login.php');
        }
?>

<section class="customer">
    <div class="container">
        <div class="customer-info-top">
        <h1>Thông tin khách hàng</h1><br>
        </div>
        <div class="customer-info">
        <table class="tbl_right">
            <?php
            $customer_id = Session::get('customer_id');
            $get_customer = $cs->get_customer( $customer_id);
            if($get_customer){
                while($result = $get_customer->fetch_assoc()){         
            ?>
            <tr>
            <th style="color: black;">Danh mục</th>
            <th></th>
            <th style="color: black;">Thông tin</th>
            </tr>        
            <tr>
                <td>Tên khách hàng</td>
                <td>:</td>
                <td><?php echo $result['khachhang_ten'] ?></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>:</td>
                <td><?php echo $result['khachhang_gioitinh'] ?></td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>:</td>
                <td><?php echo $result['khachhang_ngaysinh'] ?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>:</td>
                <td><?php echo $result['khachhang_sdt'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $result['khachhang_email'] ?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td>:</td>
                <td><?php echo $result['khachhang_diachi'] ?></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td>:</td>
                <td><?php echo md5($result['khachhang_matkhau']) ?></td>
            </tr>
            <tr>
                <td colspan="3"><a href="editcustomer.php"><span style="color: red; font-weight: bold;">Cập nhật thông tin</span></a></td>
            </tr>
            <?php }} ?>
        </table>
        <h1>Thông tin đơn hàng</h1><br>
        <?php 
        //$customer_id = Session::get('customer_id');
        //$check_order = $ct->check_order($customer_id);
        //if($check_order==true){
        //    echo '<a href="orderdetail.php"><button>Đơn hàng của bạn</button></a>';
        //}
        ?>
        <table class="tbl_left">
            <tr> 
            <th style="color: black;">Tên đơn hàng</th>
            </tr>
            <?php
            $customer_id = Session::get('customer_id');
            $get_order_by_customer = $ct->get_order_by_customer($customer_id);
            if($get_customer){
                while($result = $get_order_by_customer->fetch_assoc()){         
            ?>
             
            <tr>
                <td><a href="orderdetail.php?orderid=<?php echo $result['donhang_id'] ?>">DHANG<?php echo $result['donhang_id'] ?></a></td>
                
            </tr>
            <?php }}else{ echo '<span style="color: red; font-weight: bold;">Bạn chưa có đơn hàng</span>';} ?>      
        </table>
        </div>
    </div>

</section>

<?php
include "inc/footer.php";
?>