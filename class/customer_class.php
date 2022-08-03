<?php
define('__ROOT5__', dirname(dirname(__FILE__)));
require_once(__ROOT5__.'../lib/database.php');
require_once(__ROOT5__.'../helper/format.php');
?>
<?php
class customer{
    private $db;
    public function __construct(){
        $this -> db = new Database();
        $this -> fm = new Format();
    }
    //--------------------------backend-------------
    public function show_customer(){
        $query = "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_order_by_customer($customer_id){
        $query = "SELECT tbl_donhang.*, tbl_khachhang.khachhang_ten, tbl_khachhang.khachhang_sdt, tbl_khachhang.khachhang_email,tbl_khachhang.khachhang_diachi
        FROM tbl_donhang INNER JOIN tbl_khachhang ON tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
        WHERE tbl_khachhang.khachhang_id ='$customer_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    //--------------------------frontend---------
    public function insert_customer($data){
        $name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
        $sex = mysqli_real_escape_string($this->db->link, $data['customer_sex']);
        $date = mysqli_real_escape_string($this->db->link, $data['customer_date']);
        $phone = mysqli_real_escape_string($this->db->link, $data['customer_phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['customer_email']);
        $address = mysqli_real_escape_string($this->db->link, $data['customer_address']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['customer_password']));
        if($name=="" || $phone=="" || $email=="" || $address==""|| $password==""){
            $alert = "<span class='error'>Không được bỏ trống</span>";
            return $alert;
        }else{
            $check_email = "SELECT * FROM tbl_khachhang WHERE khachhang_email='$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'>Email đã tồn tại</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_khachhang(khachhang_ten,khachhang_gioitinh,khachhang_ngaysinh,khachhang_sdt,khachhang_email,khachhang_diachi,khachhang_matkhau) 
                VALUES('$name','$sex','$date','$phone','$email','$address','$password')";
                $result = $this->db->insert($query);
                if($result){
                    $alert ="<span class='success'>Đăng ký thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Đăng ký không thành công</span>";
                    return $alert;
                }
            }
        }
    }

    public function login_customer($data){
        $password = mysqli_real_escape_string($this->db->link, md5($data['userpass']));
        $email = mysqli_real_escape_string($this->db->link, $data['username']);
        if(empty($email)|| empty($password)){
            $alert = "<span class='error'>Không được bỏ trống</span>";
            return $alert;
        }else{
            $check_login = "SELECT * FROM tbl_khachhang WHERE khachhang_email='$email' AND khachhang_matkhau='$password' LIMIT 1";
            $result_check = $this->db->select($check_login);
            if($result_check != false){
                $value= $result_check->fetch_assoc();
               Session::set('customer_login',true);
               Session::set('customer_id',$value['khachhang_id']);
               Session::set('customer_name',$value['khachhang_ten']);
               header('Location:index.php');
            }else{
                $alert = "<span class='error'>Email hoặc password không đúng</span>";
                return $alert;
               
            }
        }
    }

    public function get_customer($customer_id){
        $query = "SELECT * FROM tbl_khachhang WHERE khachhang_id='$customer_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_customer($data,$customer_id){
        $name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
        $sex = mysqli_real_escape_string($this->db->link, $data['customer_sex']);
        $date = mysqli_real_escape_string($this->db->link, $data['customer_date']);
        $phone = mysqli_real_escape_string($this->db->link, $data['customer_phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['customer_address']);
        //$password = mysqli_real_escape_string($this->db->link, md5($data['customer_password']));
        if($name=="" || $phone=="" || $address==""){
            $alert = "<span class='error'>Không được bỏ trống</span>";
            return $alert;
        }else{
                $query = "UPDATE tbl_khachhang SET khachhang_ten='$name',khachhang_gioitinh='$sex',
                khachhang_ngaysinh='$date',khachhang_sdt='$phone',khachhang_diachi='$address'
                WHERE khachhang_id='$customer_id'";
                $result = $this->db->insert($query);
                if($result){
                    $alert ="<span class='success'>Sửa thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Sửa không thành công</span>";
                    return $alert;
                }
            }
            
    }

}

?>