
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
		<table class="table table-bordered">
			<tr>
				<th>STT</th>
				<th>Thumbnail</th>
				<th>Tiêu Đề</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Tổng Giá</th>
				<th></th>
			</tr>
<?php
// Kiểm tra và khởi tạo giỏ hàng nếu chưa tồn tại
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
$totalItems = 0; // Biến để đếm số sản phẩm hợp lệ trong giỏ hàng

// Duyệt qua các sản phẩm trong giỏ hàng
foreach($_SESSION['cart'] as $item) {
	// Kiểm tra nếu thiếu bất kỳ key quan trọng nào, bỏ qua sản phẩm đó
	if (!isset($item['thumbnail']) || !isset($item['title']) || !isset($item['discount']) || !isset($item['num']) || !isset($item['id'])) {
		continue; // Bỏ qua sản phẩm nếu thiếu dữ liệu
	}

	$totalItems++; // Tăng biến đếm khi có sản phẩm hợp lệ

	// Hiển thị dữ liệu sản phẩm nếu đầy đủ thông tin
	echo '<tr>
			<td>'.(++$index).'</td>
			<td><img src="'.$item['thumbnail'].'" style="height: 80px"/></td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['discount']).' VND</td>
			<td style="display: flex">
				<button class="btn btn-light" style="border: solid 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', -1)">-</button>
				<input type="number" id="num_'.$item['id'].'" value="'.$item['num'].'" class="form-control" style="width: 90px; border-radius: 0px" onchange="fixCartNum('.$item['id'].')"/>
				<button class="btn btn-light" style="border: solid 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', 1)">+</button>
			</td>
			<td>'.number_format($item['discount'] * $item['num']).' VND</td>
			<td><button class="btn btn-danger" onclick="updateCart('.$item['id'].', 0)">Xoá</button></td>
		</tr>';
}
?>
		</table>
		
		<?php if($totalItems > 0) { // Chỉ hiển thị nút tiếp tục thanh toán khi có sản phẩm trong giỏ ?>
			<a href="checkout.php"><button class="btn btn-success" style="border-radius: 0px; font-size: 26px;">TIẾP TỤC THANH TOÁN</button></a>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	function addMoreCart(id, delta) {
		let num = parseInt($('#num_' + id).val());
		num += delta;
		$('#num_' + id).val(num);

		updateCart(id, num);
	}

	function fixCartNum(id) {
		let num = Math.abs($('#num_' + id).val());
		$('#num_' + id).val(num);

		updateCart(id, num);
	}

	function updateCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'update_cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload();
		});
	}
</script>
