<?php
include "header.php";
include "leftside.php";
include "../class/product_class.php";
?>

<?php   
$product = new product;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
 //   var_dump($_POST,$_FILES);
// echo '<pre>';
// echo print_r($_POST);
// echo '</pre>';
   $insert_product = $product ->insert_product($_POST,$_FILES);
}
?>
 <div class="admin-content-right">
            <div class="product-add-content">
              
                <form action="productadd.php" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_tieude"> <br>
                    <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_ma"> <br>               
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                    <select required="required" name="danhmuc_id" id="danhmuc_id">
                        <option value="">--Chọn--</option>  
                        <?php
                        $show_cartegory = $product -> show_cartegory();
                        if($show_cartegory) {while($result = $show_cartegory ->fetch_assoc()){
                        ?>    
                        <option value="<?php echo $result['danhmuc_id']?>"><?php echo $result['danhmuc_ten']?></option>
                        <?php
                        }}
                        ?>                 
                    </select>
                    <label for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="loaisanpham_id" id="loaisanpham_id">
                        <option value="">--Chọn--</option>
                      
                    </select>
                    <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="color_id" id="color_id">
                        <option value="">--Chọn--</option>            
                        <?php
                        $show_color = $product -> show_color();
                        if($show_color) {while($result = $show_color ->fetch_assoc()){
                        ?>    
                        <option value="<?php echo $result['mau_id']?>"><?php echo $result['mau_ten']?></option>
                        <?php
                        }}
                        ?>                      
                    </select>
                    <label for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-size">
                    <p>S</p>    <input type="checkbox" name="sanpham-size[]" value="S"> 
                    <p>M</p>    <input type="checkbox" name="sanpham-size[]" value="M"> 
                    <p>L</p>    <input type="checkbox" name="sanpham-size[]" value="L">
                    <p>XL</p>   <input type="checkbox" name="sanpham-size[]" value="XL">  
                    <p>XXL</p>  <input type="checkbox" name="sanpham-size[]" value="XXL">  
                    </div>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_gia"> <br>  
                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"></textarea><br>  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"></textarea><br> 
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <input required type="file" name="sanpham_anh"> <br>   
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="file" multiple  name="sanpham_anhs[]"> <br>   
                    <button class="admin-btn" name="submit" type="submit">Gửi</button>  
                </form>
            </div>           
        </div>
    </section>
    <script src="script.js"></script>
    <script>
        $(document).ready(function(){
            $("#danhmuc_id").change(function(){
               // alert($(this).val())
               var x = $(this).val()
               $.get("productadd_ajax.php",{danhmuc_id:x},function(data){
                $("#loaisanpham_id").html(data);
               })
            })
        })
    </script>
</body>
</html>  