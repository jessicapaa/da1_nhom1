<?php

$title = 'Dashboard Page';
$baseURL = '';
require_once('layouts/header.php');
require_once('../utlis/utility.php');
require_once('../connect/dbhelper.php');




if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

            // người dùng
        case 'listUser':
            require_once('user/list.php');
            break;
        case 'insertUser':
            require_once('user/update.php');
            break;
        case 'updateUser':
            require_once('user/update.php');
            break;
        case 'deleteUser':
            $id = $_GET['id'];
            deleteUser($id);
            include 'user/list.php';
            break;


            // danh mục
        case 'listCategory':
            include 'category/list.php';
            break;
        case 'insertCategory':
            require_once('category/update.php');
            break;
        case 'updateCate':
            require_once('category/update.php');
            break;
        case 'deleteCate':
            $id = $_GET['id'];
            deleteCate($id);
            include 'category/list.php';
            break;

            // sản phẩm
        case 'listProduct':
            include 'product/list.php';
            break;
        case 'insertProduct':
            include 'product/update.php';
            break;
        case 'updateProduct':
            include 'product/update.php';
            break;
        case 'deleteProduct':
            $id = getGet('id');
            $updated_at = date("Y-m-d H:i:s");
            $sql = "update product set deleted = 1, updated_at = '$updated_at' where id = $id";
            execute($sql);
            include 'product/list.php';
            break;

            // phản hồi
        case 'feedback':
            include 'feedback/list.php';
            break;
        case 'view':
            $id = $_GET['id'];
            viewEd($id);
            include 'feedback/list.php';
            break;

            // order
        case 'listOrder':
            include 'order/list.php';
            break;
        case 'hoanThanh':
            $id = $_GET['id'];
            $sql = "UPDATE orders set status = 1 where id = $id";
            execute($sql);
            include 'order/list.php';
            break;
        case 'huy':
            $id = $_GET['id'];
            $sql = "UPDATE orders set status = 2 where id = $id";
            execute($sql);
            include 'order/list.php';
            break;
            //detail
        case 'detail':
            include 'order/detail.php';
            break;

        default:
            include 'thongke/list.php';

            break;
    }
} else {
    include 'thongke/list.php';
}

require_once('layouts/footer.php');
