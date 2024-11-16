<link rel="stylesheet" href="style.css">
<div class="container1">
            <div class="boxtrai mr">
                <div class="row mb">
                    <div class="boxtitle"><h2>Cập nhật tài khoản </h2></div>
                    <div class="row boxcontent formtkhoan">
                        <?php 
                            if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                                extract($_SESSION['user']);

                            }
                        ?>
                        <form action="index.php?act=edit_user" method="post">
                            <div class="form-group">
                                <label for="">Email</label> 
                                <input type="email" name="email" value="<?=$email?>" >
                            </div>
                            <div class="form-group">
                                <label for="">UserName</label> 
                                <input type="text" name="user" value="<?=$username?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="pass" value="<?=$password?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Address</label> 
                                <input type="text" name="address" value="<?=$address?>" >
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label> 
                                <input type="text" name="phone" value="<?=$phone?>" >
                            </div>
                            <div class="form-group">
                                <input class="btn" type="hidden" name="id" value="<?=$id?>" >
                                <input class="btn" type="submit" value="Cập nhật" name="update" >
                            </div>
                        </form>
                        <?php 
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                    </div>
                </div>
            </div>

</div>