<?php 
session_start();
include "view/Header.php";
include "view/Slide.php";
include "view/Homepage.php";
include "view/Footer.php";

if((isset($_GET['act']))&&($_GET['act']!="")){
        $act=$_GET['act'];
    switch($act){
        case 'signUp':
            include "./view/user/signUp.php";
            break;

        case 'signIn': 
            include "./view/user/signIn.php";
            break;
    }
    }

?>