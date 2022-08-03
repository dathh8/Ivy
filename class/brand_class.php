<?php

include "../lib/database.php";
?>
<?php
class brand {
    private $db;
    public function __construct(){
        $this -> db = new Database();
    }
    public function insert_brand($cartegory_id,$brand_name){
        $query = "INSERT INTO tbl_loaisanpham (danhmuc_id, loaisanpham_ten) VALUES('$cartegory_id','$brand_name')";
        $result = $this -> db->insert($query);
        header('location:brandlist.php');
        return $result;
    }

    public function show_cartegory(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_brand(){
       // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
       $query = "SELECT tbl_loaisanpham.*, tbl_danhmuc.danhmuc_ten
       FROM tbl_loaisanpham INNER JOIN tbl_danhmuc ON tbl_loaisanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
       ORDER BY tbl_loaisanpham.loaisanpham_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_brand($brand_id){
        $query = "SELECT * FROM tbl_loaisanpham WHERE loaisanpham_id = '$brand_id'";
        $result = $this -> db->select($query);
        return $result;
    }

    public function update_brand($cartegory_id,$brand_name,$brand_id){
        $query = "UPDATE tbl_loaisanpham SET loaisanpham_ten = '$brand_name',danhmuc_id='$cartegory_id' WHERE loaisanpham_id = '$brand_id' ";
        $result = $this -> db->update($query);
        header('location:brandlist.php');
        return $result;
    }
    public function delete_brand($brand_id){
        $query = "DELETE FROM tbl_loaisanpham WHERE loaisanpham_id = '$brand_id'";
        $result = $this -> db->delete($query);
        header('location:brandlist.php');
        return $result;
    }
}

?>