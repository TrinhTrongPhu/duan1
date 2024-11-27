<?php
    // include "./admin1/modelAdmin/user/user.php";
    $users = getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý User</title>
    <style>
        /* General Styles */
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #f0f4f7, #c8d9eb);
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
}

/* Header */
h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 28px;
    color: #4a5568;
}



/* Table Styles */
.user-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}

.user-table thead {
    background: #4a5568;
    color: #fff;
    font-size: 14px;
}

.user-table th,
.user-table td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
}

.user-table tr:hover {
    background: #f4f4f4;
    transition: background 0.3s;
}

/* Role Styles */
.role {
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 5px;
    color: #fff;
    text-transform: uppercase;
}


/* Button Styles */
.btn {
    padding: 8px 15px;
    font-size: 14px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin-right: 5px;
}

.btn.edit {
    background-color: #2563eb;
    color: white;
}

.btn.delete {
    background-color: #e53e3e;
    color: white;
}

.btn:hover {
    opacity: 0.8;
}

/* Responsive Design */
@media (max-width: 768px) {
    .user-table th, .user-table td {
        font-size: 12px;
        padding: 8px;
    }

    .btn {
        font-size: 12px;
        padding: 6px 10px;
    }
}

    </style>
</head>
<body>
    <div class="container">
    <h1>Danh sách người dùng</h1>
    <a href="index.php?act=addUser">Thêm User</a>
    <table border="1" class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
                <th>Created_at</th>
                <th>Update_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['address'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= $user['created_at'] ?></td>
                <td><?= $user['updated_at'] ?></td>

                <td>
                    <a class="btn edit" href="index.php?act=edit_user&id=<?= $user['id'] ?>">Sửa</a>
                    <a class="btn delete" href="index.php?act=deleteUser&id=<?= $user['id'] ?>" onclick="return confirm('Xác nhận xóa?');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>

