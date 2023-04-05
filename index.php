<?php
session_start();
require_once('connect/config.php');
require_once('connect/dbhelper.php');
require_once('utlis/utility.php');

require_once('view/header.php');


if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        // case 'home':
        //     require_once('view/banner.php');
        //     include './view/home.php';
        //     break;
        case 'login':
            include 'view/auth/login.php';
            break;
        case 'register':
            include './view/auth/register.php';
            break;
        case 'shop':
            include 'view/product.php';
            break;
        case 'detail':
            include 'view/detail.php';
            break;
        case 'category':
            include 'view/category.php';
            break;
        default:
        require_once('view/banner.php');
        include './view/home.php';
        break;
    }
}else {
    require_once './view/home.php';
}
require_once('view/footer.php');
