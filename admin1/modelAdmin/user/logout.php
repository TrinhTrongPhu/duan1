<?php
// require_once "../../viewAdmin/signInAdmin.php";
session_unset();
session_destroy(); // Xóa tất cả session
header("Location: ../../viewAdmin/signInAdmin.php"); // Quay lại trang đăng nhập
exit();