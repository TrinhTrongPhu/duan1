<?php
ob_start();
session_start();
ob_flush();
require_once "../modelAdmin/user/user.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lấy thông tin người dùng từ database
    $user = getUserByUsername($username);

    if ($user&&$username === $user['username'] && $password === $user['password']) {
        if ($user['role'] === 'admin') {
            // Lưu thông tin vào session
            $_SESSION['admin'] = $user;
            header('Location: ../index.php');
            exit;
        } else {
            $error = "Bạn không có quyền truy cập!";
        }
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 12px;
            border: none;
        }

        .card .form-control {
            border-radius: 8px;
        }

        .card button {
            border-radius: 8px;
        }

        .card h4 {
            font-weight: bold;
        }
    </style>
</head>


</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-sm p-4" style="width: 400px;">
            <div class="text-center mb-4">
                <h4 class="text-primary">Admin Login</h4>
                <p>Please enter your credentials to continue.</p>
            </div>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your Username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
                <?php if (!empty($error)) : ?>
                    <p style="color: red;"><?= $error ?></p>
                <?php endif; ?>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="text-decoration-none text-primary">Forgot Password?</a>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>