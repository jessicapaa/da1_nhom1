<?php

$title = 'Quản lý danh mục sản phẩm';
// $baseURL = '../';
require_once($baseURL . 'layouts/header.php');

$sql = "SELECT * from category";
$data = executeResult($sql);

?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1 class="text-xl font-bold">Danh mục sản phẩm</h1>
        <a href="http://localhost/da1_nhom1/" class="">Về trang chủ</a>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="font-semibold text-xl">Danh mục sản phẩm</div>
                    <a href="index.php?act=insertCategory" class="btn btn-primary my-3">Thêm danh mục 
                    </a>
                </div>
                <div class="card-body">
                    <table id="table1" class="table w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                
                                <th class="" colspan="2">Action</th>
                            </tr>
                        </thead class="mt-[10px]">
                        <tbody>
                            <?php
                            $index = 0;
                            foreach ($data as $item):
                                $id = $item['id'];
                                $updateCate = "index.php?act=updateCate&id=$id"; 
                                $deleteCate = "index.php?act=deleteCate&id=$id";
                                ?>
                                <tr>
                                <th><?=++$index?></th>
                                <th><?=$item['name']?></th>
                                
                                <td>
                                    <a href="<?=$updateCate ?>" class="btn bg-[blue] text-white hover:bg-[blue] ">Sửa</a>
                                    <a href="<?=$deleteCate ?>" class="btn bg-[red] text-white hover:bg-[blue]"onclick="return confirm('Xác nhận xóa') ">Xóa</a>
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