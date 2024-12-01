<!-- <?php
    ob_start();
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Chỉ khởi tạo session nếu chưa bắt đầu
    }
    // include './model/pdo.php';
    include './model/binhluan.php';
    $Product_id = $_REQUEST['Product_id'];
    $dsbl = loadall_reviews($Product_id);
    ob_flush();
?>
<div class="row mb">
            <div class="boxtitle">BÌNH LUẬN</div>
            <div class="boxcontent2 binhluan">
            <table>
                    <?php
                    // echo "Nội dung bình luận ở đây: ".$Product_id;
                        foreach ($dsbl as $bl) {
                            extract($bl);
                            echo '<tr>
                            <td>'.$noidung.'</td>';
                            echo '<td>'.$User_id.'</td>';
                            echo '<td>'.$Created_at.'</td>
                            </tr>';
                        }
                    ?>
            </table>
            </div>
            <div class="boxfooter binhluanform">

                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="Product_id" value="<?= $Product_id ?>">
                    <input type="text" name="noidung" id="">
                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                </form>
            </div>

            <?php
                if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
                    $noidung = $_POST['noidung'];
                    $Product_id = $_POST['Product_id'];
                    $User_id = $_SESSION['users']['id'];
                    $Created_at = date("h:i:sa d/m/Y");
                    insert_reviews($noidung, $User_id, $Product_id, $Created_at);
                    header("Location: view/products-detail/productDetail");
                }
            ?>

        </div>
</body>
</html> -->