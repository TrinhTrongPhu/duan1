<?php
include "pdo.php";

// Xử lý đăng nhập
// Hàm lấy người dùng theo username
function getUserByUsername($username) {
    $sql = "SELECT * FROM users WHERE username = ?";
    return pdo_query_one($sql, $username);
}

// Hàm lấy tất cả người dùng
function getAllUsers() {
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

// Hàm lấy người dùng theo ID
function getUserById($id) {
    $sql = "SELECT * FROM users WHERE id = ?";
    return pdo_query_one($sql, $id);
}

// Hàm thêm người dùng mới
function addUser($username, $password, $email, $phone, $address, $role) {
    $sql = "INSERT INTO users (username, password, email, phone, address, role) 
            VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute($sql, $username, $password, $email, $phone, $address, $role);
}

// Hàm cập nhật thông tin người dùng
function editUser($id, $username, $email, $phone, $address, $role) {
    $sql = "UPDATE users SET username = ?, email = ?, phone = ?, address = ?, role = ? 
            WHERE id = ?";
    return pdo_execute($sql, $username, $email, $phone, $address, $role, $id);
}

// Hàm xóa người dùng
function deleteUser($id) {
    $sql = "DELETE FROM users WHERE id = ?";
    return pdo_execute($sql, $id);
}
?>
