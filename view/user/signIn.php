<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Chỉ khởi tạo session nếu chưa bắt đầu
}
include "view/user/signUp.php" ?>
<link rel="stylesheet" href="style.css">
        <div class="username">
                    <?php 
                        if(isset($_SESSION['user'])){
                        // extract($_SESSION['user']);
                        $username = $_SESSION['user']["username"];
                    ?>     
                    <div class="row mb10">
                        <h2>Xin chào <?=$username?></h2>
                    </div>
                    <div class="row mb10">
                        
                        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                        <li><a href="index.php?act=edit_user">Cập nhật tài khoản</a></li>
                        <li><a href="index.php?act=logOut">Thoát</a></li>
                        
                        <?php } else { ?>
                        
       
<div class="container1">
<form action="index.php?act=signIn" id="login-form" method="post">
            <h2>Login</h2>
            <div class="form-group">
                <label for="login-email">UserName</label>
                <input type="text" name="user" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="pass" placeholder="Enter your password" required>
            </div>
            <input type="submit" value="Login" name="signIn" class="btn" >
            <br> <br>
            <a href="#" class="toggle-link" onclick="toggleForms()">Don't have an account? Register</a>
            <a href="#" class="forgot-pass" onclick="" style="margin: 100px;">Forgot password</a> <br>
        </form>
                    <?php } ?>
</div>
</div>  
<script>
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            }
        }
    </script>
