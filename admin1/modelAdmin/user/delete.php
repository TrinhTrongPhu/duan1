<?php
    require_once 'user.php';
    // require_once '../../viewAdmin/userShow.php';
    $id = $_GET['id'];
    deleteUser($id);
    header("Location: index.php?act=clients");
    exit;
?>