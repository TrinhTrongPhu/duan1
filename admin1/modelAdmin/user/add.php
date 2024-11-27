<?php
require_once 'user.php';
// require_once './admin1/viewAdmin/userShow.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $password =($_POST['password']);

    addUser($username, $password, $email, $phone, $address, $role);
    header("Location: index.php?act=clients");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>
<body>
<div class="add-user-container">
    <h1>Thêm người dùng</h1>
    <form method="POST" class="add-product-form">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Phone: <input type="number" name="phone"></label><br>
        <label>Address: <input type="text" name="address"></label><br>
        <label>Role: 
            <select name="role">
                <option value="client">client</option>
                <option value="admin">admin</option>
            </select>
        </label><br>
        <button type="submit">Thêm</button>
    </form>
</div>
</body>
</html>
