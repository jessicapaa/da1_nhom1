<?php

$title = 'Quản lý sản phẩm';
// $baseURL = '../';
require_once($baseURL . 'layouts/header.php');

$sql = "SELECT product.*, category.name as category_name from
product left join category on product.category_id = category.id where product.deleted = 0";
$data = executeResult($sql);

?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1 class="text-xl font-bold">Quản lý sản phẩm</h1>
        <a href="http://localhost/da1-nhom1" class="">Về trang chủ</a>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="font-semibold text-xl">Sản phẩm</div>
                    <a href="index.php?act=insertProduct" class="btn btn-primary my-3">Thêm mới sản phẩm
                    </a>
                </div>
                <div class="card-body">
                    <table id="table1" class="table w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Thumbnail</th>
                                <th>Tên sản phẩm</th>
                                <th>Gía</th>
                                <th>Gỉam giá</th>
                                <th>Danh mục</th>
                                <th>Nội dung</th>
                                <th class="" colspan="2">Action</th>
                            </tr>
                        </thead class="mt-[10px]">
                        <tbody>
                            <?php

                            $index = 0;
                            foreach ($data as $item) :
                                $id = $item['id'];
                                $updateProduct = "index.php?act=updateProduct&id=$id";
                                $deleteProduct = "index.php?act=deleteProduct&id=$id";
                            ?>


                                <tr>
                                    <th><?= ++$index ?></th>
                                    <th>
                                        <img src="../public/photo<?= $item['thumbnail'] ?>" style=" height: 100px;" alt="">
                                    </th>
                                    <th><?= $item['title'] ?></th>
                                    <th><?= number_format($item['price']) ?> VNĐ</th>
                                    <th><?= number_format($item['discount']) ?> VNĐ</th>
                                    <th><?= $item['category_name'] ?></th>
                                    <th><?= $item['description'] ?></th>
                                    <td>
                                        <a href="<?= $updateProduct ?>" class="btn bg-[blue] text-white hover:bg-[blue] ">Sửa</a>
                                        <a href="<?= $deleteProduct ?>" class="btn bg-[red] text-white hover:bg-[blue]" onclick="return confirm('Xác nhận xóa') ">Xóa</a>
                                    </td>

                                </tr>
                        </tbody>
                    <?php endforeach ?>


                    </table>

                </div>
            </div>
        </section>

    </div>


    <?php require_once($baseURL . 'layouts/footer.php'); ?>