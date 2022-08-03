<?php
include '../lib/session.php';
Session::checkSession();
?>

<section class="admin-content row space-between">
        <div class="admin-content-left">
        <div class="header-top-left">
            <a href="index.php"><p> <span>I</span>vy</p></a>
        </div>
            <ul>
                <li><a  href="#"> <img style="width:20px" src="icon/hi.png" alt="">Chào:  <span style="color:blueviolet; font-size:22px"><?php echo Session::get('admin_name') ?></span><span style="color: red; font-size:20px">❤</span></a>
                <li><a href="#"><img style="width:20px" src="icon/order.png" alt="">Đơn hàng</a>
                    <ul>
                        <li><a href="orderprocessing.php">Danh sách đơn hàng chưa xử lý</a></li>
                        <li><a href="ordercomplete.php">Danh sách đơn hàng đã xử lý</a></li>
                        <li><a href="orderlist.php">Danh sách tất cả đơn hàng</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/options.png" alt="">Danh sách khách hàng</a>
                    <ul>
                        <li><a href="customerlist.php">Danh sách</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/options.png" alt="">Danh Mục</a>
                    <ul>
                        <li><a href="cartegorylist.php">Danh sách</a></li>
                        <li><a href="cartegoryadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/menu.png" alt="">Loại Sản Phẩm</a>
                    <ul>
                        <li><a href="brandlist.php">Danh sách</a></li>
                        <li><a href="brandadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/colour.png" alt="">Màu sắc</a>
                    <ul>
                        <li><a href="colorlist.php">Danh sách</a></li>
                        <li><a href="coloradd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/article.png" alt="">Sản phẩm</a>
                    <ul>
                        <li><a href="productlist.php">Danh sách</a></li>
                        <li><a href="productadd.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/picture.png" alt="">Ảnh Sản phẩm</a>
                    <ul>
                        <li><a href="anhsanphamlists.php">Danh sách</a></li>
                        <li><a href="anhsanphamadds.php">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/size.png" alt="">Size Sản phẩm</a>
                    <ul>
                        <li><a href="sizesanphamlists.php">Danh sách</a></li>
                        <li><a href="sizesanphamadds.php">Thêm</a></li>
                    </ul>
                </li>
                <?php
                if(isset($_GET['action']) && $_GET['action']=='logout'){
                    Session::destroy();
                }
                ?>
                <li><a href="?action=logout"> <img style="width:20px" src="icon/logout.png" alt="">Đăng Xuất</a>
                    
                </li>
            </ul>
        </div>