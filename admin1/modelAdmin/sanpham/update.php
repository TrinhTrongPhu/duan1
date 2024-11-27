<?php  require_once 'modelAdmin/db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM sanpham WHERE id = $id");
    $product = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $iddm = $_POST['iddm'];

    $sql = "UPDATE sanpham SET product_name='$product_name', description='$description', brand='$brand', 
    model = '$model',size='$size', color='$color',category_id='$iddm', update_at=NOW() WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?act=products");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    height: 100vh;
    margin: 0;
}

.edit-product-container {
    width: 100%;
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    color: #444;
}

/* Form Styles */
.edit-product-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 14px;
    margin-bottom: 5px;
    color: #555;
}

.form-group input {
    width: 100%;
    padding: 8px 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

.form-group input:focus {
    border-color: #007bff;
    outline: none;
}

/* Button Styles */
.form-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn {
    padding: 8px 15px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn.save {
    background-color: #007bff;
    color: white;
}

.btn.save:hover {
    background-color: #0056b3;
}

.btn.cancel {
    background-color: #dc3545;
    color: white;
}

.btn.cancel:hover {
    background-color: #b21f2d;
}

</style>
 <div class="edit-product-container">
        <h1>Chỉnh sửa sản phẩm</h1>
<form method="POST" class="edit-product-form">
    <div class="form-group">
        <label for="product-name">Tên sản phẩm: </label>
        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="product-name">Mô tả: </label>
        <textarea name="description"><?php echo $product['description']; ?></textarea><br>
    </div>
    <div class="form-group">
        <label for="product-name">Thương hiệu: </label>
        <input type="text" name="brand" value="<?php echo $product['brand']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="product-name">Model: </label>
        <input type="text" name="model" value="<?php echo $product['model']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="product-name">Size: </label>
        <input type="text" name="size" value="<?php echo $product['size']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="product-name">Màu sắc: </label>
        <input type="text" name="color" value="<?php echo $product['color']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="product-name">IDDM: </label>
        <input type="text" name="iddm" value="<?php echo $product['category_id']; ?>"><br>
    </div>

    <button type="submit" name="update">Cập nhật</button>
</form>
