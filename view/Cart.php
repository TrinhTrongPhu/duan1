<link rel="stylesheet" href="style.css">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Chỉ khởi tạo session nếu chưa bắt đầu
}
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.cart-container {
    
    width: 80%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #444;
}

/* Cart Table Styles */
.cart-table {
    
    width: 100%;
    border-collapse: collapse;
}

.cart-table th,
.cart-table td {
    padding: 10px;
    text-align: left;
}

.cart-table th {
    background-color: #007bff;
    color: white;
    border-bottom: 2px solid #ddd;
}

.cart-table td {
    border-bottom: 1px solid #ddd;
}

.cart-table img {
    max-width: 100px;
    border-radius: 8px;
}

.cart-table input{
    width: 100px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.cart-table .btn {
    width: 100px;
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #dc3545;
    color: white;
}

.cart-table .btn.remove:hover {
    background-color: #b21f2d;
}

.cart-total {
    text-align: center;
    margin-top: 20px;
}

.cart-total p {
    font-size: 18px;
    font-weight: bold;
}

.cart-total #total {
    color: #007bff;
    font-size: 22px;
}

.cart-total a {
    text-decoration: none;
    padding: 10px 20px;
    font-size: 16px;
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.cart-total a:hover {
    background-color: #218838;
}

</style>
<link rel="stylesheet" href="style.css">
<div class="cart-container">
    <h1>Giỏ hàng của bạn</h1>
    <?php if (empty($cart)): ?>
        <p>Giỏ hàng trống!</p>
        <a href="index.php">Tiếp tục mua sắm</a>
    <?php else: ?>
        <table class="cart-table"">
        <thead>
            <tr>
            <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
				<th>Size</th>
				<th>Màu</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><img src=" <?php echo ($item['img']); ?>" alt="">
            </td>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</td>
            <td>
                <form action="index.php?act=cart&action=update" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                    <button type="submit">Cập nhật</button>
                </form>
            </td>
            <td><?php echo htmlspecialchars($item['size']); ?></td>
            <td><?php echo htmlspecialchars($item['color']); ?></td>
            <td><?php
                $subtotal = (float)$item['price'] * $item['quantity'];
                $total += $subtotal;
                echo number_format($subtotal, 0, ',', '.');
                ?> VNĐ</td>

            <td>
                <a class="btn remove" href="index.php?act=cart&action=remove&product_id=<?php echo $item['id']; ?>">Xóa</a>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <div class="cart-total">
            <p>Tổng Tiền: <?php echo number_format($total, 0, ',', '.'); ?> VNĐ</p>
            <a href="index.php?act=checkout">Thanh toán</a>
        </div>
    <?php endif; ?>
</div>