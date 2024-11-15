<?php include "view/Header.php"?>
<div class="row mb">
            <div class="boxtrai mr">
                <div class="row mb">
                    <div class="boxtitle">Đăng ký tài khoản </div>
                    <div class="row boxcontent formtkhoan">
                        <form action="index.php?act=signUp" method="post">
                            <div class="row mb10">
                                Email 
                                <input type="email" name="email" >
                            </div>
                            <div class="row mb10">
                                Tên đăng nhập 
                                <input type="text" name="user" >
                            </div>
                            <div class="row mb10">
                                Mật khẩu 
                                <input type="password" name="pass" >
                            </div>
                            <div class="row mb10">
                                <input type="submit" value="Đăng ký" name="signUp" >
                            </div>
                            <div class="row mb10">
                                <input type="reset" value="Nhập lại">
                            </div>
                        </form>
                        <?php 
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                        ?>
                    </div>
                </div>
            </div>

</div>
<?php include "view/Footer.php"?>