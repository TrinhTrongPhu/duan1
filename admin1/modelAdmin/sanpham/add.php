<?php require_once 'modelAdmin/db.php';

?>
<?php
$target_dir = __DIR__ . "/../../upload/"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            height: 100vh;
            margin: 0 auto;
        }

        .add-product-container {
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
        .add-product-form {
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

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 8px 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        /* Button Styles */
        .form-actions {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
        }

        .btn.add:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="add-product-container">
        <h2>Add Product</h2>
        <form class="add-product-form" action="index.php?act=addProduct" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Tên sản phẩm:</label>
                <input type="text" id="product-name" name="product_name" placeholder="Nhập tên sản phẩm" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" placeholder="Nhập mô tả sản phẩm" required></textarea>
            </div>

            <div class="form-group">
                <label for="brand">Thương hiệu:</label>
                <input type="text" name="brand" placeholder="Nhập thương hiệu" required>
            </div>

            <div class="form-group">
                <label for="model">Mẫu:</label>
                <input type="text" name="model" placeholder="Nhập mẫu sản phẩm" required>
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục:</label>
                <select id="category" name="category_id">
                    <option value="">Chọn danh mục</option>
                    <option value="1">Giày</option>
                    <option value="2">Quần Áo</option>
                    <option value="3">Phụ kiện</option>
                </select>
            </div>

            <div class="form-group">
                <label for="size">Kích thước:</label>
                <input type="text" name="size" placeholder="Nhập kích thước (VD: S, M, L, XL)" required>
            </div>

            <div class="form-group">
                <label for="color">Màu sắc:</label>
                <input type="text" name="color" placeholder="Nhập màu sắc" required>
            </div>

            <div class="form-group">
                <label for="image_url">Hình ảnh:</label>
                <input type="file" name="image_url" required>
            </div>
            <div class="form-actions">
            <button type="submit" name="submit">Thêm sản phẩm</button>
            </div>

        </form>
    </div>
    <?php

    if (isset($_POST['submit'])) {
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $category_id = $_POST['category_id'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $image_url = $_FILES['image_url']['name'];

        // Sử dụng đường dẫn đầy đủ cho thư mục upload
        $target_dir = __DIR__ . "/../../upload/"; // Đảm bảo thư mục này tồn tại
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa tồn tại
        }

        $target_file = $target_dir . basename($image_url);

        // Kiểm tra nếu quá trình di chuyển tệp thành công
        if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO sanpham (product_name, description, brand, model, category_id, size, color, image_url, created_at, update_at)
                VALUES ('$product_name', '$description', '$brand', '$model', '$category_id', '$size', '$color', '$target_file', NOW(), NOW())";

            if ($conn->query($sql) === TRUE) {
                echo "Thêm sản phẩm thành công!";
                header("Location: index.php?act=products");
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Lỗi: Không thể tải lên hình ảnh. Kiểm tra lại quyền truy cập thư mục.";
        }
    }

    ?>
</body>

</html>