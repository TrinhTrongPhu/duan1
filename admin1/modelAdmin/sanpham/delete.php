<?php
 require_once 'modelAdmin/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM sanpham WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?act=products");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
