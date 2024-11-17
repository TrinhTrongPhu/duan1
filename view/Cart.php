<link rel="stylesheet" href="style.css">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Chỉ khởi tạo session nếu chưa bắt đầu
}
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<h1>Giỏ hàng</h1>
<?php if (empty($cart)): ?>
    <p>Giỏ hàng trống!</p>
    <a href="index.php">Tiếp tục mua sắm</a>
<?php else: ?>
    <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
				<!-- <th>Size</th>
				<th>Màu</th> -->
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</td>
                    <td>
                        <form action="index.php?act=cart&action=update" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                            <button type="submit">Cập nhật</button>
                        </form>
                    </td>
                    <td><?php 
                        $subtotal = (float)$item['price'] * $item['quantity'];
                        $total += $subtotal;
                        echo number_format($subtotal, 0, ',', '.'); 
                    ?> VNĐ</td>
					<!-- <td><?php echo htmlspecialchars($item['size']); ?></td>
					<td><?php echo htmlspecialchars($item['color']); ?></td> -->
                    <td>
                        <a href="index.php?act=cart&action=remove&product_id=<?php echo $item['id']; ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Thành Tiền: <?php echo number_format($total, 0, ',', '.'); ?> VNĐ</h2>
   <button > <a href="index.php?act=checkout">Thanh toán</a></button>
<?php endif; ?>
