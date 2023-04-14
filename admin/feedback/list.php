<?php

$title = 'Quản lý phản hồi';
// $baseURL = '../';
require_once($baseURL . 'layouts/header.php');

$sql = "SELECT * FROM feedback order by status asc, updated_at desc";
$data = executeResult($sql);


?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1 class="text-xl font-bold">Quản lý phản hồi</h1>
        <a href="http://localhost/da1_nhom1/" class="">Về trang chủ</a>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="font-semibold text-xl">Phản hồi</div>
                    <!-- <a href="index.php?act=insertUser" class="btn btn-primary my-3">Thêm mới 
                        </a> -->
                </div>
                <div class="card-body">
                    <table id="table1" class="table w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Chủ đề</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th class="" colspan="1">Đã đọc</th>
                            </tr>
                        </thead class="mt-[10px]">
                        <tbody>
                            <?php
                            
                            $index = 0;
                            foreach ($data as $item):
                                $id = $item['id'];
                                $updateUser = "index.php?act=updateUser&id=$id"; 
                                $view = "index.php?act=view&id=$id";

                                ?>
                               
        
                                <tr>
                                <th><?=++$index?></th>
                                <th><?=$item['fullname']?></th>
                                <th><?=$item['email']?></th>
                                <th><?=$item['phone_number']?></th>
                                <th><?=$item['subject_name']?></th>
                                <th><?=$item['note']?></th>
                                <th><?=$item['created_at']?></th>
                               <?php 
                                if($item['status'] == 0) {
                                    echo ' <td>
                                    ';
                                     echo '<a  href="'.$view.'"   class="btn bg-[blue] text-white hover:bg-[green]" >Đã đọc</a>';

                                    echo ' </td> ';
                                }
                               ?>
                               
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