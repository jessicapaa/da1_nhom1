<?php

$title = 'Quản lý người dùng';
// $baseURL = '../';
require_once($baseURL . 'layouts/header.php');

$sql = "SELECT user.*, role.name as role_name FROM user left join role on user.role_id = role.id WHERE user.deleted = 0";
$data = executeResult($sql);

?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1 class="text-xl font-bold">Quản lý người dùng</h1>
        <a href="http://localhost/da1_nhom1/" class="">Về trang chủ</a>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="font-semibold text-xl">Người dùng</div>
                    <a href="index.php?act=insertUser" class="btn btn-primary my-3">Thêm mới 
                        </a>
                </div>
                <div class="card-body">
                    <table id="table1" class="table w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Quyền</th>
                                <th class="" colspan="2">Action</th>
                            </tr>
                        </thead class="mt-[10px]">
                        <tbody>
                            <?php
                            
                            $index = 0;
                            foreach ($data as $item):
                                $id = $item['id'];
                                $updateUser = "index.php?act=updateUser&id=$id"; 
                                $deleteUser = "index.php?act=deleteUser&id=$id";

                                ?>
                               
        
                                <tr>
                                <th><?=++$index?></th>
                                <th><?=$item['fullname']?></th>
                                <th><?=$item['email']?></th>
                                <th><?=$item['phone_number']?></th>
                                <th><?=$item['address']?></th>
                                <th><?=$item['role_name']?></th>
                               
                                <td>
                                    <a href="<?=$updateUser ?>" class="btn bg-[blue] text-white hover:bg-[blue] ">Sửa</a>
                                    <a href="<?=$deleteUser ?>" class="btn bg-[red] text-white hover:bg-[blue]"onclick="return confirm('Xác nhận xóa') ">Xóa</a>
                                </td>
                               
                                </tr>                            
                        </tbody>
                        <?php endforeach?>

                        
                    </table>
                    
                </div>
            </div>
        </section>

    </div>
    

    <?php require_once($baseURL . 'layouts/footer.php'); ?>