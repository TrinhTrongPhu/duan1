<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <form method="post" onsubmit="validateForm()">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="usr" name="fullname" placeholder="Nhập họ * tên">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($fullname)) { ?>
                        <span style="color: red;">Vui lòng nhập họ tên.</span>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($email)) { ?>
                        <span style="color: red;">Vui lòng nhập email.</span>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập sđt">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($phone)) { ?>
                        <span style="color: red;">Vui lòng nhập số điện thoại.</span>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($address)) { ?>
                        <span style="color: red;">Vui lòng nhập địa chỉ.</span>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Nội dung:</label>
                    <textarea class="form-control" rows="3" name="note"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Tiêu Đề</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá</th>
                    </tr>
                    <?php
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $index = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        if (!isset($item['title']) || !isset($item['discount']) || !isset($item['num']) || !isset($item['id'])) {
                            continue; // Bỏ qua sản phẩm nếu thiếu dữ liệu
                        }
                        echo '<tr>
                                <td>' . (++$index) . '</td>
                                <td>' . $item['title'] . '</td>
                                <td>' . number_format($item['discount']) . ' VND</td>
                                <td>' . $item['num'] . '</td>
                                <td>' . number_format($item['discount'] * $item['num']) . ' VND</td>
                            </tr>';
                    }
                    ?>
                </table>
                <div class="checkout-container">
                    <button type="submit" class="btn btn-success" style="border-radius: 0px; font-size: 26px; width: 100%;">
                        THANH TOÁN
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function validateForm(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Kiểm tra và lấy dữ liệu từ form
                $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
                $address = isset($_POST['address']) ? $_POST['address'] : '';
                $note = isset($_POST['note']) ? $_POST['note'] : '';
<?php
                // Kiểm tra và hiển thị lỗi nếu dữ liệu chưa đầy đủ
                if (empty($fullname)) {
                    echo "Vui lòng nhập họ tên.";
                } elseif (empty($email)) {
                    echo "Vui lòng nhập email.";
                } elseif (empty($phone)) {
                    echo "Vui lòng nhập số điện thoại.";
                } elseif (empty($address)) {
                    echo "Vui lòng nhập địa chỉ.";
                }?> else {
                    // Xử lý thanh toán (hoặc bạn có thể lưu dữ liệu vào cơ sở dữ liệu)
                    echo "Thông tin đã được gửi thành công!";
                    // Bạn có thể chuyển hướng đến trang "hoàn tất" sau khi xử lý thành công
                    header("Location: index.php?act=complete");
                    exit;
                
                }
            }
    }
</script>