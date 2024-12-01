<?php require_once 'modelAdmin/db.php'; 
// require_once '../../modelAdmin/db.php'; 
    
?>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    /* display: flex; */
    /* justify-content: center; */
    /* align-items: center; */
    /* height: 100vh; */
    margin: 0;
}

.product-container {
    width: 90%;
    max-width: 1200px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #444;
}

/* Table Styles */
.product-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.product-table th,
.product-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 14px;
}

.product-table th {
    background-color: #007bff;
    color: white;
    text-align: center;
}

.product-table td img {
    max-width: 70px;
    border-radius: 8px;
}

.product-table td {
    text-align: center;
}

.product-table .btn {
    padding: 6px 12px;
    font-size: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 2px;
}

.product-table .btn.edit {
    background-color: #007bff;
    color: white;
}

.product-table .btn.edit:hover {
    background-color: #0056b3;
}

.product-table .btn.delete {
    background-color: #dc3545;
    color: white;
}

.product-table .btn.delete:hover {
    background-color: #b21f2d;
}

</style>
<div class="product-container">
<h2>Danh sách sản phẩm</h2> <br>
<h5 style="color:gray;"><a href="index.php?act=addProduct">Thêm sản phẩm</a></h5>
<table border="1" class="product-table">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Thương hiệu</th>
        <th>Model</th>
        <th>Size</th>
        <th>Màu sắc</th>
        <th>IDDM</th>
        <th>Hành động</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM sanpham");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['product_name']}</td>
            <td><img src='{$row['image_url']}' style='max-width: 100px; height: auto;'></td>
            <td>{$row['brand']}</td>
            <td>{$row['model']}</td>
            <td>{$row['size']}</td>
            <td>{$row['color']}</td>
            <td>{$row['category_id']}</td>
            <td>
                <a href='index.php?act=updateProduct&id={$row['id']}'>Sửa</a> |
                <a href='index.php?act=deleteProduct&id={$row['id']}' >Xóa</a>
            </td>
        </tr>";
    }
    ?>
</table>
</div>