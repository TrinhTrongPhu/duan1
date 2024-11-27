<?php
require_once 'user.php';
$id = $_GET['id'];
$user = getUserById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    editUser($id, $username, $email, $phone, $address, $role);
    header("Location: index.php?act=clients");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin người dùng</title>
    <style>
        /* General Styles */
body {
    font-family: 'Roboto', sans-serif;  
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #e9f5fc, #d4e8f6);
    color: #333;
}

.container {
    /* max-width: 600px; */
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 26px;
    color: #4a5568;
}

/* Form Styles */
.edit-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.form-group label {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

.form-group input,
.form-group select {
    width: 400px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
    outline: none;
}

.form-group input[readonly] {
    background: #f1f1f1;
    color: #aaa;
}

/* Buttons */
.form-actions {
    display: flex;
    /* justify-content: center; */
    gap: 10px;
    margin-top: 20px;
}
.form-actions a{
    color: white;
}
.btn {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn.save {
    background-color: #2563eb;
    color: white;
}

.btn.save:hover {
    background-color: #1d4ed8;
}

.btn.cancel {
    background-color: #e53e3e;
    color: white;
}

.btn.cancel:hover {
    background-color: #c53030;
}

    </style>
</head>

<body>
    <div class="container">
    <h1>Chỉnh sửa thông tin người dùng</h1>
    <form action="" method="POST" class="edit-form">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="<?php echo $user['phone']; ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php echo $user['address']; ?>">
        </div>

        <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin" <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="client" <?php echo ($user['role'] === 'client') ? 'selected' : ''; ?>>Client</option>
        </select>
        </div>

        <div class="form-actions">
                <button type="submit" class="btn save">Save</button>
                <a class="btn cancel" href="index.php?act=clients">Cancel</a>
        </div>
    </form>
    </div>
</body>

</html>