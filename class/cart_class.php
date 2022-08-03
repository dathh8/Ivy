<?php
define('__ROOT3__', dirname(dirname(__FILE__)));
require_once(__ROOT3__.'../lib/database.php');
require_once(__ROOT3__.'../helper/format.php');
?>
<?php
class cart {
    private $db;
    public function __construct(){
        $this -> db = new Database();
    }
    public function add_tocart($quanlity,$product_id){
        $quanlity =  mysqli_real_escape_string($this->db->link,$quanlity);
        $product_id = mysqli_real_escape_string($this->db->link,$product_id);
        $sid = session_id();

        $query = "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$product_id'";
        $result = $this->db-> select($query)->fetch_assoc();
        $product_img = $result["sanpham_anh"];
        $product_price = $result["sanpham_gia"];
        $product_name = $result["sanpham_tieude"];

       // $check_cart = "SELECT * FROM tbl_giohang WHERE sanpham_id = '$product_id' AND giohang_sid ='$sid'";
       // if($check_cart){
        //    $msg = "Sản phẩm đã được thêm trong giỏ hàng";
        //    return $msg;
        //}else{
        $query_insert = "INSERT INTO tbl_giohang(sanpham_id,giohang_sid,sanpham_tieude,sanpham_gia,giohang_soluong,sanpham_anh)
         VALUES('$product_id','$sid','$product_name','$product_price','$quanlity','$product_img') ";
        $insert_cart = $this->db->insert($query_insert);
        if($result){
            header('Location:cart.php');
        }
   // }
   
         
    }
    public function format_currency($n=0){
        $n=(string)$n;
        $n=strrev($n);
        $res='';
        for($i=0;$i<strlen($n);$i++){
           if($i%3==0 && $i !=0){
              $res.='.';
           }
           $res.=$n[$i];
        }$res=strrev($res);
        return $res;
     }
    public function get_product_cart(){
        $sid = session_id();
        $query = "SELECT * FROM tbl_giohang WHERE giohang_sid = '$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_product_cart($cart_id){
        $cart_id = mysqli_real_escape_string($this->db->link, $cart_id);
        $query = "DELETE FROM tbl_giohang WHERE giohang_id='$cart_id'";
        $result = $this->db->delete($query);
        if($result){
        header('Location:cart.php');
        }else{
            $msg = "a";
            return $msg;
        }  
    }
    public function check_cart(){
        $sid = session_id();
        $query = "SELECT *FROM tbl_giohang WHERE giohang_sid = '$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function check_order($customer_id){
        $sid = session_id();
        $query = "SELECT *FROM tbl_donhang WHERE khachhang_id = '$customer_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_all_data_cart(){
        $sid = session_id();
        $query = "DELETE FROM tbl_giohang WHERE giohang_sid = '$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    //--------------------client-info----------------
    public function insert_client(){
        $client_name = $_POST['khachle_ten'];
        $client_phone = $_POST['khachle_sdt'];
        $client_email = $_POST['khachle_email'];
        $client_memo = $_POST['khachle_ghichu'];
        $client_address = $_POST['khachle_diachi'];
        $query = "INSERT INTO tbl_khachle (khachle_ten,khachle_sdt,khachle_email,khachle_ghichu,khachle_diachi) 
        VALUES ('$client_name','$client_phone','$client_email','$client_memo','$client_address')";
        $result = $this ->db ->insert($query);
        header('location:payment.php');
        return $result;
        
    }
    //--------------------payment----------------
    public function get_client(){
        $query = "SELECT * FROM tbl_khachle ORDER BY khachle_id DESC LIMIT 1";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_product_cart_order(){
        $sid = session_id();
        $query = "SELECT * FROM tbl_giohang WHERE giohang_sid = '$sid' ORDER BY giohang_id DESC LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_order1($customer_id){
        $delivery_method = $_POST['delivery-method'];
        $method_payment = $_POST['method-payment'];
        $sid = session_id(); 
                $customer_id = $customer_id;
                $query_order = "INSERT INTO tbl_donhang (khachhang_id,
                donhang_giaohang,donhang_thanhtoan) 
                VALUES ('$customer_id','$delivery_method','$method_payment')";
                $insert_order1 = $this ->db ->insert($query_order);
                
                if($insert_order1){
                    $query_select = "SELECT * FROM tbl_donhang ORDER BY donhang_id DESC LIMIT 1";
                    $get_order = $this ->db ->select($query_select);
                        while($result = $get_order->fetch_assoc()){
                            $order_id = $result['donhang_id'];
                        $query = "SELECT *FROM tbl_giohang WHERE giohang_sid = '$sid'";
                        $get_product = $this->db->select($query);
                        if($get_product){
                            while($result = $get_product->fetch_assoc()){
                        $product_id = $result['sanpham_id'];
                        $product_name = $result['sanpham_tieude'];
                        $quanlity = $result['giohang_soluong'];
                        $product_price = $result['sanpham_gia'];
                        $product_img = $result['sanpham_anh'];
                    //foreach ($product_id as $key => $element){
                        $query = "INSERT INTO tbl_donhang_sanpham (donhang_id,sanpham_id,sanpham_tieude,
                        donhang_soluong,sanpham_gia,sanpham_anh) VALUES('$order_id','$product_id','$product_name','$quanlity',
                        '$product_price','$product_img')";
                        $result = $this ->db ->insert($query);}
                    }
                }   
                }
                return $insert_order1;
    }
    public function insert_order($client_id,$cart_id){
        $delivery_method = $_POST['delivery-method'];
        $method_payment = $_POST['method-payment'];
        $query = "INSERT INTO tbl_donhang (khachle_id,giohang_id,donhang_giaohang,donhang_thanhtoan) 
        VALUES ('$client_id','$cart_id','$delivery_method','$method_payment')";
        $result = $this ->db ->insert($query);
        header('location:success.php');
        return $result;
    }
    //--------------------successs----------------
    public function get_order($customer_id){
        $query = "SELECT * FROM tbl_donhang WHERE khachhang_id = '$customer_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_order_detail($customer_id,$order_id){
        $query = "SELECT tbl_donhang.*, tbl_khachhang.khachhang_ten, tbl_khachhang.khachhang_sdt, tbl_khachhang.khachhang_email,tbl_khachhang.khachhang_diachi
        FROM tbl_donhang JOIN tbl_khachhang ON tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
        WHERE tbl_donhang.donhang_id='$order_id' ";
        $result = $this ->db ->select($query);
        return $result;   
    

    }
    public function get_order_success(){
        $query = "SELECT tbl_donhang.*, tbl_donhang.*, tbl_khachhang.khachhang_ten, tbl_khachhang.khachhang_sdt, tbl_khachhang.khachhang_email,tbl_khachhang.khachhang_diachi
        FROM tbl_donhang JOIN tbl_khachhang ON tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
         ORDER BY donhang_id DESC LIMIT 1";
        $result = $this -> db->select($query);
        return $result;
    }
     //-----------------------order detal by customer-----------------------
    public function get_order_by_customer($customer_id){
        $query = "SELECT * FROM tbl_donhang WHERE khachhang_id = '$customer_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_order_detail_by_customer($order_id){
        $query = "SELECT * FROM tbl_donhang_sanpham WHERE donhang_id = '$order_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    //-----------------------admin-----------------------
    public function show_order(){
        $query = "SELECT tbl_donhang.*, tbl_khachhang.khachhang_ten, tbl_khachhang.khachhang_sdt, tbl_khachhang.khachhang_email,tbl_khachhang.khachhang_diachi
        FROM tbl_donhang INNER JOIN tbl_khachhang ON tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
         ORDER BY donhang_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cart_by_order($order_id){
        $sid = session_id();
        $query = "SELECT tbl_donhang.*,tbl_giohang.sanpham_anh, tbl_giohang.sanpham_tieude, tbl_giohang.giohang_soluong, tbl_giohang.sanpham_gia
        FROM tbl_donhang INNER JOIN tbl_giohang ON tbl_donhang.giohang_id = tbl_giohang.giohang_id WHERE donhang_id='$order_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function delete_order($order_id){
        $query = "DELETE FROM tbl_donhang WHERE donhang_id = '$order_id'";
        $result = $this -> db->delete($query);
        header('location:orderlist.php');
        return $result;
    }
    public function update_order($order_id){
        $query = "UPDATE tbl_donhang SET donhang_tinhtrang = '1' WHERE donhang_id = '$order_id' ";
        $result = $this -> db->update($query);
        header('location:orderprocessing.php');
        return $result;
    }
    public function show_order_processing(){
        $query = "SELECT tbl_donhang.*, tbl_khachhang.khachhang_ten, tbl_khachhang.khachhang_sdt, tbl_khachhang.khachhang_email,tbl_khachhang.khachhang_diachi
        FROM tbl_donhang INNER JOIN tbl_khachhang ON tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
        WHERE donhang_tinhtrang ='0' ORDER BY donhang_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_order_complete(){
        $query = "SELECT tbl_donhang.*, tbl_khachhang.khachhang_ten, tbl_khachhang.khachhang_sdt, tbl_khachhang.khachhang_email,tbl_khachhang.khachhang_diachi
        FROM tbl_donhang INNER JOIN tbl_khachhang ON tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
        WHERE donhang_tinhtrang ='1' ORDER BY donhang_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }

    
}

?>