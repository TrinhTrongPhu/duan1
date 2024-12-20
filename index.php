<?php
session_start();
ob_start();
include "view/Header.php";
include "model/pdo.php";
include "model/user.php";
include "model/sanpham.php";
include "model/productDetail.php";
include "model/cart.php";
include "global.php";


if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'signUp':
            if (isset($_POST['signUp']) && ($_POST['signUp'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                insert_taikhoan($user, $pass, $email);
                $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để tương tác!";
            }
            include "./view/user/signUp.php";
            break;

        case 'signIn':
            if (isset($_POST['signIn']) && ($_POST['signIn'])) {
                $pass = $_POST['pass'];
                $user = $_POST['user'];
                // var_dump($user);
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    // header('Location: index.php');
                    $_SESSION['user'] = $checkuser;
                    // var_dump($checkuser);
                    $thongbao = "Đã đăng nhập thành công";
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "./view/user/signIn.php";
            break;

        case 'edit_user':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $user = $_POST['user'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $id = $_POST['id'];
                update_user($id, $user, $pass, $email, $address, $phone);
                $_SESSION['user'] = checkuser($user, $pass);
                header('location: index.php?act=edit_user');
            }
            include "./view/user/edit_user.php";
            break;

        case 'logOut':
            session_unset();
            session_destroy();
            header("Location: index.php");
            break;

        case 'shopList':
            include "view/shopList.php";
            break;

        case 'productDetail':
            include 'view/products-detail/productDetail.php';
            break;

        case 'cart':
            include "view/cart.php";
            break;

        case 'checkout':
            include 'view/checkout.php';
            break;

        case 'checkoutDone':

            


            break;

        case 'complete':
            include 'view/complete.php';
            break;

        case 'about':
            include "cilent/about.html";
            break;

        case 'contact':
            include "cilent/contact.html";
            break;
    }
} else include "view/Homepage.php";
ob_end_flush();
// include "view/Slide.php";
// include "view/Homepage.php";
include "view/Footer.php";
