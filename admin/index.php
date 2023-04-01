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
            $id = $_GET['id'];
            deleteProduct($id);
            include 'product/list.php';
            break;
    }
}

require_once('layouts/footer.php');
