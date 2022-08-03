<?php
//$filepath = realpath(dirname(__FILE__));
define('__ROOT2__', dirname(dirname(__FILE__)));
require_once(__ROOT2__.'../lib/database.php');
?>
<?php
class cartegory {
    private $db;
    public function __construct(){
        $this -> db = new Database();
    }
    public function insert_cartegory($cartegory_name){
        $query = "INSERT INTO tbl_danhmuc (danhmuc_ten) VALUES('$cartegory_name')";
        $result = $this -> db->insert($query);
        header('location:cartegorylist.php');
        return $result;
    }

    public function show_cartegory(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_cartegory($cartegory_id){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$cartegory_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function update_cartegory($cartegory_name,$cartegory_id){
        $query = "UPDATE tbl_danhmuc SET danhmuc_ten = '$cartegory_name' WHERE danhmuc_id = '$cartegory_id' ";
        $result = $this -> db->update($query);
        header('location:cartegorylist.php');
        return $result;
    }
    public function delete_cartegory($cartegory_id){
        $query = "DELETE FROM tbl_danhmuc WHERE danhmuc_id = '$cartegory_id'";
        $result = $this -> db->delete($query);
        header('location:cartegorylist.php');
        return $result;
    }
    //-------------------------------------------------end back end-------------------------------------------------------------------------
    public function show_cartegory_frontend(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_brand_index($cartegory_id){
        //$query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT * FROM tbl_loaisanpham WHERE danhmuc_id = '$cartegory_id'";
       $result = $this -> db->select($query);
       return $result;
    }
    public function show_brand($cartegory_id){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '$cartegory_id'";
         $result = $this -> db->select($query);
         return $result;
     }
     //-------------------------------------------------------phan trangcategory ra
     public function get_product_by_category($cartegory_id){
        $sp_tungtrang = 24; 
        if(!isset($_GET['trang'])){
             $trang = 1;
         }else{
             $trang = $_GET['trang'];
         }
         $tung_trang = ($trang - 1)*$sp_tungtrang;
        $query = "SELECT * FROM tbl_sanpham WHERE loaisanpham_id = '$cartegory_id' ORDER BY sanpham_id DESC LIMIT $tung_trang,$sp_tungtrang ";
        $result = $this -> db->select($query);
        return $result;
    }
    public function get_product_by_category_all($cartegory_id){
        $query = "SELECT * FROM tbl_sanpham WHERE loaisanpham_id = '$cartegory_id' ORDER BY sanpham_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    //-------------------------------------------------------het phan trang  category ra
    public function get_name_category($cartegory_id){
        $query = "SELECT tbl_loaisanpham.*, tbl_danhmuc.danhmuc_ten
       FROM tbl_loaisanpham INNER JOIN tbl_danhmuc ON tbl_loaisanpham.danhmuc_id = tbl_danhmuc.danhmuc_id WHERE loaisanpham_id ='$cartegory_id'
       ORDER BY tbl_loaisanpham.loaisanpham_id DESC";
        $result = $this -> db->select($query);
        return $result;
        //$query = "SELECT  tbl_sanpham.*,tbl_danhmuc.danhmuc_ten,tbl_danhmuc.danhmuc_id 
        //FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.danhmuc_id=tbl_danhmuc.danhmuc_id AND tbl_sanpham.danhmuc_id = '$cartegory_id'";
    }
    public function get_product_related($cartegory_id){
        $query = "SELECT * FROM tbl_sanpham WHERE loaisanpham_id = '$cartegory_id' ORDER BY RAND() LIMIT 5";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_by_search(){
        $search = $_GET['search'];
        $query = "SELECT * FROM tbl_sanpham  WHERE sanpham_tieude like '%$search%' ORDER BY sanpham_tieude LIMIT 24";
        $result = $this -> db->select($query);
        return $result;
    }
    //-------------------------------------------------------show 8 category ra
    public function show_cartegory_nu(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='27'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_nam(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='26'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_treem(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='25'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_sale(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='24'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_dacbiet(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='23'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_bosuutap(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='22'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_tintuc(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='21'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_cartegory_thongtin(){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id ='20'";
        $result = $this -> db->select($query);
        return $result;
    }
    //---------------------------show brand by category------------------------------
    public function show_brand_nu(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '27'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
     public function show_brand_nam(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '26'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
     public function show_brand_treem(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '25'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
     public function show_brand_sale(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '24'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
     public function show_brand_dacbiet(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '23'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
     public function show_brand_bosuutap(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '22'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
     public function show_brand_tintuc(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '21'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
     public function show_brand_thongtin(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT*FROM tbl_loaisanpham WHERE danhmuc_id = '20'ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
}

?>