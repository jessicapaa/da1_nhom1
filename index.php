<?php
// session_start();
ob_start();
require_once('connect/config.php');
require_once('connect/dbhelper.php');
require_once('utlis/utility.php');

require_once('view/header.php');


if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {

        case 'login':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include 'view/authen/process_form_login.php';
            }
            include 'view/authen/login.php';
            break;
        case 'logout':
            if ($user != null) {
                $user = getUserToken();
                $token = getCookie('token');
                $id = $user['id'];
                $sql = "delete from tokens where user_id = '$id' and token = '$token'";
                execute($sql);
                setcookie('token', '', time() - 100, '/');
            }
            session_destroy();

            require_once('view/home.php');
            break;
        case 'register':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include 'view/authen/process_form_register.php.php';
            }
            include './view/authen/register.php';
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
        case 'contact':
            include 'view/contact.php';
            break;
        case 'cart':
            include 'view/cart.php';
            break;
        case 'checkout':
            include 'view/checkout.php';
            break;
        case 'complete':
            include 'view/complete.php';
            break;
        case 'lichsu':
            include 'view/lichsu.php';
            break;


        default:
            require_once('view/banner.php');
            include './view/home.php';
            break;
    }
} else {
    require_once './view/home.php';
}
require_once('view/footer.php');
