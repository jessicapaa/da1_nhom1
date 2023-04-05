<?php

$title = 'Quản lý đơn hàng';
// $baseURL = '../';
require_once($baseURL . 'layouts/header.php');
$sql = "SELECT * FROM orders order by status asc, order_date desc";
$data = executeResult($sql);

if (isset($_POST['hoanThanh']) && $_POST['hoanThanh']) {
    $id = getPost('id');
    $sql = "UPDATE orders set status = 1 where id = $id";
    execute($sql);
}
?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1 class="text-xl font-bold">Quản lý đơn hàng</h1>
        <a href="http://localhost/da1-nhom1" class="">Về trang chủ</a>
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
                        <thead  class="mt-[10px]">
                            <tr>
                                <th>STT</th>
                                <th>Họ & Tên </th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Nội dung</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt đơn</th>
                                <th>Chi tiết đơn hàng</th>
                                <th class="" colspan="1">Trạng thái</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

                            $index = 0;
                            foreach ($data as $item) :
                                $id = $item['id'];
                                $hoanThanh = "index.php?act=hoanThanh&id=$id";
                                $huy = "index.php?act=huy&id=$id";
                                $detail = "index.php?act=detail&id=$id";

                            ?>


                                <tr class="mt-4">
                                    <th><?= ++$index ?></th>
                                    <th><?= $item['fullname'] ?></th>
                                    <th><?= $item['email'] ?></th>
                                    <th><?= $item['phone_number'] ?></th>
                                    <th><?= $item['address'] ?></th>
                                    <th><?= $item['note'] ?></th>
                                    <th><?= $item['total_money'] ?></th>
                                    <th><?= $item['order_date'] ?></th>
                                    <th> 
                                        <a class="font-bold text-lg text-[green]" href="<?=$detail ?>">Chi tiết </a>
                                         </th>
                                    <a href="" onclick = "return confirm('Bạn có muốn hủy kh')">âs </a>
                                    
                                     
                                    <?php
                                    echo ' <td>';

                                    if ($item['status'] == 0) {

                                        echo '<a href= "' . $hoanThanh . '"  class="btn w-100 btn-sm btn-success text-white"  style="margin-bottom : 10px ;" >Hoàn thành</a>';
                                        echo   '</br>';
                                        echo '<a href= "' . $huy . '"  class="btn btn-sm btn-danger w-100 text-white " onclick = "return confirm("Bạn có muốn hủy đơn hàng không ?") ">Hủy</a>';
                                    } else if ($item['status'] == 1) {
                                        echo ' <label class = "w-100 badge btn btn-success btn-sm"> Đã hoàn thành </label> ';
                                    } else {
                                        echo ' <label class = "w-100 badge btn btn-danger btn-sm"> Đã hủy </label> ';
                                    }
                                    echo ' </td> ';

                                    ?>

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