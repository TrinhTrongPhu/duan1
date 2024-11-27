<?php
session_start();
ob_start();
if (!isset($_SESSION['admin'])) {
    header('Location: viewAdmin/signInAdmin.php');
    exit;
}

$admin = $_SESSION['admin'];
require_once 'modelAdmin/user/user.php';
include "viewAdmin/menuDoc.php";
include "viewAdmin/header.php";
include "viewAdmin/shortcut.php";


if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "clients":
            include 'viewAdmin/userShow.php';
            break;
        case "deleteUser":
            include 'modelAdmin/user/delete.php';
            break;
        case "addUser":
            include 'modelAdmin/user/add.php';
            break;
        case "edit_user":
            include 'modelAdmin/user/edit_user.php';
            break;

        case "products":
            include 'modelAdmin/sanpham/edit.php';
            break;
        case "updateProduct":
            include 'modelAdmin/sanpham/update.php';
            break;
        case "deleteProduct":
            include 'modelAdmin/sanpham/delete.php';
            break;
        case "addProduct":
            include 'modelAdmin/sanpham/add.php';
            break;
    }
}
ob_end_flush();
?>
<a href="./modelAdmin/user/logout.php">Đăng xuất</a>