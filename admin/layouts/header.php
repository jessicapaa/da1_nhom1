<?php
session_start();

require_once($baseURL . '../utlis/utility.php');
require_once($baseURL . '../connect/dbhelper.php');

$user = getUserToken();
if ($user == null) {
    header('Location:' . $baseURL . 'authen/login.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= $baseURL ?>../public/admin/dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= $baseURL ?>../public/admin/dist/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/css/shared/iconly.css">
    <!--    <link rel="stylesheet" href="../public/admin/dist/assets/extensions/filepond/filepond.css"/>-->
    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css" />
    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/extensions/toastify-js/src/toastify.css" />
    <!--    <link rel="stylesheet" href="../public/admin/dist/assets/css/pages/filepond.css"/>-->
    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/css/pages/fontawesome.css" />
    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/css/pages/datatables.css" />
    <link rel="stylesheet" href="<?= $baseURL ?>../public/admin/dist/assets/extensions/sweetalert2/sweetalert2.min.css" <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
    <style>
        label.error {
            color: rgb(220 53 69) !important;
        }

        .input {

            position: relative;
        }

        .icon {
            position: absolute;
            top: 22px;
            left: 7px;
        }

        body {
            max-height: 2000px;
            ;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="http://localhost/da1_nhom1/"><img src="<?= $baseURL ?>../public/admin/dist/assets/images/logo/logo.svg" alt="Logo" srcset=""></a>
                        </div>

                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="<?= $baseURL ?>index.php?act=thongke" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="<?= $baseURL ?>index.php?act=listCategory" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Quản lý danh mục</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="<?= $baseURL ?>index.php?act=listProduct" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Quản lý sản phẩm</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="<?= $baseURL ?>index.php?act=listOrder" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Quản lý đơn hàng</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="<?= $baseURL ?>index.php?act=feedback" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Quản lý phản hồi</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="<?= $baseURL ?>index.php?act=listUser" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Quản lý người dùng</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>