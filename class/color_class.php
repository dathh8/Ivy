<?php
$filepath = realpath(dirname(__FILE__));
include "../lib/database.php";
?>
<?php
class color {
    private $db;
    public function __construct(){
        $this -> db = new Database();
    }
    public function insert_img($color_name,$color_img){
        $query = "INSERT INTO tbl_mau (mau_ten, mau_anh) VALUES('$color_name','$color_img')";
        $result = $this -> db->insert($query);
        header('location:colorlist.php');
        return $result;
    }

    public function show_color(){
        $query = "SELECT * FROM tbl_mau ORDER BY mau_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
 /*   public function show_brand(){
       // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
       $query = "SELECT tbl_loaisanpham.*, tbl_danhmuc.danhmuc_ten
       FROM tbl_loaisanpham INNER JOIN tbl_danhmuc ON tbl_loaisanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
       ORDER BY tbl_loaisanpham.loaisanpham_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
*/    
    public function get_color($color_id){
        $query = "SELECT * FROM tbl_mau WHERE mau_id = '$color_id'";
        $result = $this -> db->select($query);
        return $result;
    }

    public function update_color($color_id,$color_name,$color_img){
        $query = "UPDATE tbl_mau SET mau_ten = '$color_name',mau_anh='$color_img' WHERE mau_id = '$color_id' ";
        $result = $this -> db->update($query);
        header('location:colorlist.php');
        return $result;
    }
    public function delete_color($color_id){
        $query = "DELETE FROM tbl_mau WHERE mau_id = '$color_id'";
        $result = $this -> db->delete($query);
        header('location:colorlist.php');
        return $result;
    }
}

?>