
<link rel="stylesheet" href="style.css">
<div class="container1">
<form id="register-form" action="index.php?act=signUp" method="post" style="display: none;">
            <h2>Register</h2>
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="login-email">UserName</label>
                <input type="text" name="user" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" name="pass" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="register-confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" placeholder="Confirm your password" required>
            </div>
            <input type="submit" class="btn" value="Register" name="signUp"> <br> <br>
            <a href="#" class="toggle-link" onclick="toggleForms()">Already have an account? Login</a>
        </form>
        <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
</div>
