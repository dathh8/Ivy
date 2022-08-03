<?php
include '../lib/session.php';
Session::checkLogin();
include '../lib/database.php';
include '../helper/format.php';
?>
<?php

    class adminlogin
    {
        private $db;
        private $fm;
        public function __construct()
        {
           $this->db = new Database();
           $this->fm = new Format(); 
        }
        public function login_admin($adminuser,$adminpass){
            $adminuser = $this ->fm ->validation($adminuser);
            $adminpass = $this ->fm ->validation($adminpass);

            $adminuser = mysqli_real_escape_string($this->db->link, $adminuser);
            $adminpass = mysqli_real_escape_string($this->db->link, $adminpass);
            if(empty($adminuser) || empty($adminpass)){
                $alert = "User và Pass không được để trống";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_admin WHERE admin_user = '$adminuser' AND admin_pass = '$adminpass' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true);
                    Session::set('admin_id',$value['admin_id']);
                    Session::set('admin_user',$value['admin_user']);
                    Session::set('admin_name',$value['admin_name']);
                    header('Location:index.php');
                }else{
                    $alert = "User hoặc Pass sai";
                    return $alert;
                }
            }
        }
    }

?>