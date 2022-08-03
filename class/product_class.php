<?php
define('__ROOT4__', dirname(dirname(__FILE__)));
//$filepath = realpath(dirname(__FILE__));
require_once(__ROOT4__.'../lib/database.php');
?>
<?php
class product {
    private $db;
    public function __construct(){
        $this -> db = new Database();
    }
    public function show_cartegory(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_brand(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT * FROM tbl_loaisanpham ORDER BY loaisanpham_id DESC";
         $result = $this -> db->select($query);
         return $result;
     }
    public function insert_product(){
        $product_name = $_POST['sanpham_tieude'];
        $product_code = $_POST['sanpham_ma'];
        $cartegory_id = $_POST['danhmuc_id'];
        $brand_id = $_POST['loaisanpham_id'];
        $color_id = $_POST['color_id'];
        $product_price = $_POST['sanpham_gia'];
        $product_desc = $_POST['sanpham_chitiet'];
        $product_preseve = $_POST['sanpham_baoquan'];


        // var_dump($_FILES);
        $file_name = $_FILES['sanpham_anh']['name'];
        $file_temp = $_FILES['sanpham_anh']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $product_img = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "uploads/".$product_img;
        move_uploaded_file($file_temp,$upload_image);
        $file_names = $_FILES['sanpham_anhs']['name'];
        $file_temps = $_FILES['sanpham_anhs']['tmp_name'];

        $query = "INSERT INTO tbl_sanpham (
            sanpham_tieude,
            sanpham_ma,
            danhmuc_id,
            loaisanpham_id,
            mau_id,
            sanpham_gia,
            sanpham_chitiet,
            sanpham_baoquan,
            sanpham_anh)
            VALUES(
            '$product_name',
            '$product_code',
            '$cartegory_id',
            '$brand_id',
            '$color_id',
            '$product_price',
            '$product_desc',
            '$product_preseve',
            '$product_img')";
            $result = $this ->db ->insert($query);
            if($result){
                $query = "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC LIMIT 1";
                $result = $this ->db ->select($query)->fetch_assoc();
                $product_id = $result['sanpham_id'];
                    foreach ($file_names as $key => $element)
                    {
                        move_uploaded_file($file_temps[$key],"uploads/" .$element); 
                        $query = "INSERT INTO tbl_sanpham_anh (sanpham_id,sanpham_anh) VALUES('$product_id','$element')";
                        $result = $this ->db ->insert($query);
                    }
                $product_size = $_POST['sanpham-size'];
                foreach ($product_size as $key => $element)
                    {
                        $query = "INSERT INTO tbl_sanpham_size (sanpham_id,sanpham_size) VALUES('$product_id','$element')";
                        $result = $this ->db ->insert($query);
                    }

            }

            header('location:productlist.php');
            return $result;
    }
    


/*        $filetarget = basename($_FILES['product_img']['name']);
        $filetype = strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
        $filesize = $_FILES['product_img']['size'];
        if (file_exists("uploads/$filetarget")) {
            $alert = "File đã tồn tại";
            return $alert;
        }
        else {
            if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg" ) {
                $alert = "Chỉ chọn file .jpg .png .jpeg";
                return $alert;
            }
            else {
                if($filesize > 1000000){
                    $alert = "File không được lớn hơn 1MB";
                     return $alert;
                }
                else{
                    move_uploaded_file( $_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
                    $query = "INSERT INTO tbl_product (
                    product_name,
                    cartegory_id,
                    brand_id,
                    product_price,
                    product_price_new,
                    product_desc,
                    product_img)
                    VALUES(
                    '$product_name',
                    '$cartegory_id',
                    '$brand_id',
                    '$product_price',
                    '$product_price_new',
                    '$product_desc',
                    '$product_img')";
                    $result = $this -> db->insert($query);
                    if($result){
                        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                        $result = $this -> db -> select($query)->fetch_assoc();
                        $product_id = $result['product_id'];
                        $filename = $_FILES['product_img_desc']['name'];
                        $filetmp = $_FILES['product_img_desc']['tmp_name'];

                        foreach ($filename as $key => $value)
                        {
                            move_uploaded_file( $filetmp[$key],"uploads/".$value);
                            $query = "INSERT INTO tbl_product_img_desc (product_id,product_img_desc) VALUES('$product_id','$value')";
                            $result = $this -> db->insert($query);
                        }
                    }
                    }
                

                    }

            
        }
       // header('location:brandlist.php');
        return $result;
    }
*/

    public function show_brand_ajax($cartegory_id){
        $query = "SELECT * FROM tbl_loaisanpham WHERE danhmuc_id = '$cartegory_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    
    public function get_brand($brand_id){
        $query = "SELECT * FROM tbl_loaisanpham WHERE loaisanpham_id = '$brand_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_color(){
        $query = "SELECT * FROM tbl_mau ORDER BY mau_id DESC";
        $result = $this -> db->select($query);
        return $result;
    }
    public function show_product(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten, tbl_loaisanpham.loaisanpham_ten, tbl_mau.mau_anh, tbl_mau.mau_ten
       FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id 
       INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id 
       INNER JOIN tbl_mau ON tbl_sanpham.mau_id = tbl_mau.mau_id
       ORDER BY tbl_sanpham.sanpham_id DESC";
       
         $result = $this -> db->select($query);
         return $result;
     }
     public function delete_product($product_id){
        $query = "DELETE FROM tbl_sanpham WHERE sanpham_id = '$product_id'";
        $result = $this -> db->delete($query);
        header('location:productlist.php');
        return $result;
    }
    

//    public function show_product(){
 //       $query = "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC";
 //       $result = $this -> db->select($query);
 //       return $result;
 //   }
    public function get_product($product_id){
        $query = "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$product_id'";
        $result = $this -> db->select($query);
        return $result;
    }
    public function update_product($product_id){
        $product_name = $_POST['sanpham_tieude'];
        $product_code = $_POST['sanpham_ma'];
        $cartegory_id = $_POST['danhmuc_id'];
        $brand_id = $_POST['loaisanpham_id'];
        $color_id = $_POST['color_id'];
        $product_price = $_POST['sanpham_gia'];
        $product_desc = $_POST['sanpham_chitiet'];
        $product_preseve = $_POST['sanpham_baoquan'];


        // var_dump($_FILES);
        $permited = array('jpg','jpeg','png',);
        $file_name = $_FILES['sanpham_anh']['name'];
        $file_size = $_FILES['sanpham_anh']['size'];
        $file_temp = $_FILES['sanpham_anh']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $product_img = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "uploads/".$product_img;
        move_uploaded_file($file_temp,$upload_image);
        $file_names = $_FILES['sanpham_anhs']['name'];
        $file_temps = $_FILES['sanpham_anhs']['tmp_name'];
        if (!empty($file_name)){
            if($file_size > 1024) {
                $alert = "<span class ='error'>File ảnh không được vượt quá 1MB!</span>";
               return $alert;
            }elseif(in_array($file_ext, $permited)==false){
                $alert = "<span class = 'error'>Chỉ được :-".implode(',',$permited)."</span>";
                //echo "<span class = 'error'>Chỉ được :-".implode(',',$permited)."</span>";
                return $alert;
            }
            $query = "UPDATE tbl_sanpham (
                sanpham_tieude,
                sanpham_ma,
                danhmuc_id,
                loaisanpham_id,
                mau_id,
                sanpham_gia,
                sanpham_chitiet,
                sanpham_baoquan,
                sanpham_anh)
                VALUES(
                '$product_name',
                '$product_code',
                '$cartegory_id',
                '$brand_id',
                '$color_id',
                '$product_price',
                '$product_desc',
                '$product_preseve',
                '$product_img')
                WHERE sanpham_id = '$product_id'";
        }else{
            //Neeus nguoi dung khong chon anh
            $query = "UPDATE tbl_sanpham SET
                sanpham_tieude = '$product_name',
                sanpham_ma = '$product_code',
                danhmuc_id = '$cartegory_id',
                loaisanpham_id = '$brand_id',
                mau_id = '$color_id',
                sanpham_gia = '$product_price',
                sanpham_chitiet = '$product_desc',
                sanpham_baoquan = '$product_preseve'
                
                WHERE sanpham_id = '$product_id'";
                
                $result = $this -> db->update($query);
        }
    

        
        $result = $this -> db->update($query);
        header('location:productlist.php');
        return $result;
    }





    
    public function update_brand($cartegory_id,$brand_name,$brand_id){
        $query = "UPDATE tbl_brand SET brand_name = '$brand_name',cartegory_id='$cartegory_id' WHERE brand_id = '$brand_id' ";
        $result = $this -> db->update($query);
        header('location:brandlist.php');
        return $result;
    }
    public function delete_brand($brand_id){
        $query = "DELETE FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this -> db->delete($query);
        header('location:brandlist.php');
        return $result;
    }


//end back end
public function show_brand_index($cartegory_id){
       //$query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
       $query = "SELECT * FROM tbl_loaisanpham WHERE danhmuc_id = '$cartegory_id'";
      $result = $this -> db->select($query);
      return $result;
   }

public function get_product_detail($product_id){
    $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten, tbl_loaisanpham.loaisanpham_ten, tbl_mau.mau_anh, tbl_mau.mau_ten
    FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id 
    INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id 
    INNER JOIN tbl_mau ON tbl_sanpham.mau_id = tbl_mau.mau_id
    WHERE tbl_sanpham.sanpham_id = '$product_id'";
    
      $result = $this -> db->select($query);
      return $result;
}
public function get_product_img($product_id){
    $query = "SELECT * FROM tbl_sanpham_anh  WHERE sanpham_id = '$product_id'";           
    $result = $this -> db->select($query);
    return $result;
}

    
}

?>