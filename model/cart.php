<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Chỉ khởi tạo session nếu chưa bắt đầu
}

// Nếu action là thêm sản phẩm vào giỏ hàng
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $product_img = $_POST['product_img'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $product_size = $_POST['product_size'];
    $product_color = $_POST['product_color'];
    
    // Tạo sản phẩm
    $product = [
        'img'=> $product_img,
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $quantity,
        'size' => $product_size,
        'color' => $product_color,
    ];

    // Nếu giỏ hàng chưa tồn tại, khởi tạo nó
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra sản phẩm đã tồn tại chưa
    $is_existing = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] += $quantity; // Tăng số lượng
            $is_existing = true;
            break;
        }
    }

    // Nếu chưa có, thêm sản phẩm mới
    if (!$is_existing) {
        $_SESSION['cart'][] = $product;
    }

    // Chuyển hướng về trang giỏ hàng
    header("Location: index.php?act=cart");
    exit();
}

// Nếu action là xóa sản phẩm
if (isset($_GET['action']) && $_GET['action'] === 'remove') {
    $product_id = $_GET['product_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]); // Xóa sản phẩm
        }
    }

    header("Location: index.php?act=cart");
    exit();
}

// Nếu action là cập nhật số lượng
if (isset($_GET['action']) && $_GET['action'] === 'update') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] = $quantity; // Cập nhật số lượng
            break;
        }
    }

    header("Location: index.php?act=cart");
    exit();
}
?>
