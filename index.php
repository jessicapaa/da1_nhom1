<?php
session_start();
require_once('view/header.php');
require_once('view/banner.php');
require_once ('view/sanpham/list.php');
      

if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
switch ($act) {
    case 'home' : {
        include './view/home.php';
        break;
    }
    case 'sanpham':
        include './view/sanpham/list.php';
        break;
        case 'login':
            include 'view/auth/login.php';
            break;
    case 'register':
            include 'view/auth/register.php';
            break;
    case 'cart':
            include 'view/product.php';
            break;
    
    }
}
require_once('view/footer.php');
