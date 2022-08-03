<section class="footer">
        <div class="footer-container">
            <p>Tải ứng dụng IVY moda</p>
            <div class="app-google">
                <a href=""><img src="html_frontend/images/appstore.jpg" alt=""></a>
                <a href=""> <img src="html_frontend/images/googleplay.jpg" alt=""></a>
            </div>
            <p>Nhận bản tin IVY moda</p>
            <div class="input-email">
                <input type="text" placeholder="Nhập email của bạn">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="footer-items">
                <li><a href=""><img src="html_frontend/images/dathongbao.png" alt=""></a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href=""><i class="fab fa-facebook-f"></i></a><a href=""><i class="fab fa-youtube"></i></a></li>
            </div>
            <div class="footer-text">
                Công ty Cổ phần Dự Kim với số đăng ký kinh doanh: 0105777650 <br>
Địa chỉ đăng ký: Tổ dân phố Tháp, P.Đại Mỗ, Q.Nam Từ Liêm, TP.Hà Nội, Việt Nam - 0243 205 2222 <br>
Đặt hàng online : <b>0339943123.</b>
            </div>
            <div class="footer-bottom">
                ©Ivymoda All rights reserved
            </div>
        </div>
    </section>






</body>
<script src="html_frontend/js/script.js"></script>
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
</html>            