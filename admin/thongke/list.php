<?php

$title = 'Thống kê';
// $baseURL = '../';
require_once($baseURL . 'layouts/header.php');

$sql =
    "SELECT orders.order_date, COUNT(orders.id) AS soLuong,SUM(order_details.total_money) AS tongTien FROM orders JOIN order_details on orders.id = order_details.order_id
GROUP BY orders.order_date order by orders.order_date DESC limit 8
";
$result = executeResult($sql);
$sum = "SELECT SUM(tongTien) as tong from (SELECT orders.order_date, COUNT(orders.id) AS soLuong,SUM(order_details.total_money) AS tongTien FROM orders JOIN order_details on orders.id = order_details.order_id
GROUP BY orders.order_date ) as b1";
$tong = executeResult($sum);

$month = "
SELECT t.title, t.total_money, t.product_id, t.month, SUM(t.total_quantity) AS total_quantity 
FROM ( SELECT p.title, b.total_money, b.product_id, MONTH(c.order_date) AS month, SUM(b.num) AS total_quantity
      FROM orders AS c 
      JOIN order_details AS b ON b.order_id = c.id
      JOIN product as p ON b.product_id = p.id 
      GROUP BY b.product_id, MONTH(c.order_date),b.total_money
     )AS t
 GROUP BY t.product_id, t.month ,t.total_money
 HAVING SUM(t.total_quantity) = MAX(t.total_quantity) 
 ORDER BY `total_quantity` DESC LIMIT 5

";
$thang = executeResult($month);

$danhMuc = "SELECT COUNT(*) as count FROM category ";
$dM = executeResult($danhMuc);

$sp = executeResult("SELECT COUNT(*) as count FROM product ");
$dh = executeResult("SELECT COUNT(*) as count FROM orders ");
$nd = executeResult("SELECT COUNT(*) as count FROM user ");

$don = "SELECT COUNT(*)as dem FROM `orders` ";
$d = executeResult($don);

$choXacNhan = executeResult("SELECT COUNT(*)as dem FROM `orders` where status = 0 ");
$daXacNhan = executeResult("SELECT COUNT(*)as dem FROM `orders` where status = 1 ");
$daHuy = executeResult("SELECT COUNT(*)as dem FROM `orders` where status = 2 ");
?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1 class="text-xl font-bold">Thống kê</h1>
        <a href="http://localhost/da1_nhom1/" class="">Về trang chủ</a>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="font-semibold text-xl mb-2">THỐNG KÊ</div>

                </div>
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tổng quan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="p-3 rounded-4 bg-primary">
                                            <div class="details">
                                                <h3>
                                                    <?= $dM[0]['count'] ?>
                                                </h3>
                                                <h4>danh mục</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="p-3 rounded-4 bg-secondary">
                                            <div class="details">
                                                <h3>
                                                    <?= $sp[0]['count'] ?>
                                                </h3>
                                                <h4>sản phẩm</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="p-3 rounded-4 bg-info">
                                            <div class="details">
                                                <h3>
                                                    <?= $dh[0]['count'] ?>
                                                </h3>
                                                <h4>đơn hàng</h4>
                                            </div>
                                            <div id="spark3"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="p-3 rounded-4 bg-success">
                                            <div class="details">
                                                <h3>
                                                    <?= $nd[0]['count'] ?>
                                                </h3>
                                                <h4>người dùng</h4>
                                            </div>
                                            <div id="spark4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Doanh thu theo ngày </h4>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>STT</th>
                                                <th>Ngày</th>
                                                <th>Số lượng</th>
                                                <th>Tổng Giá</th>
                                            </tr>
                                            <?php

                                            $index = 0;
                                            foreach ($result as $item) {
                                                echo '<tr>
	                                     		<td>' . (++$index) . '</td>
		                                     	<td>' . $item['order_date'] . '</td>
		                                        <td>
		                                     		' . $item['soLuong'] . '
			                                    </td>
			                                    <td>
			                                    	' . number_format($item['tongTien']) . ' VNĐ
			                                    </td>
		                                        </tr>';
                                            }
                                            ?>
                                        </table>

                                        <h4>Tổng:
                                            <?= number_format($tong['0']['tong']) ?> VNĐ
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-doanh-thu-ngay"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- BÁN CHẠY NHẤT THEO THÁNG -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Sản phẩm bán chạy theo tháng </h4>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Tháng</th>
                                                <th>Số lượng bán ra </th>
                                                <th>Tổng Giá</th>
                                            </tr>
                                            <?php

                                            $index = 0;
                                            foreach ($thang as $item) {
                                                $tongTien = (int) $item['total_money'] * (int) $item['total_quantity'];
                                                echo '<tr>
	                                     		<td>' . (++$index) . '</td>
		                                     	<td>' . $item['title'] . '</td>
		                                        <td>
		                                     		' . $item['month'] . '
			                                    </td>
		                                        <td>
		                                     		' . $item['total_quantity'] . '
			                                    </td>
			                                    <td>
			                                    	' . number_format($tongTien) . ' VNĐ

			                                    </td>
		                                        </tr>';
                                            }
                                            ?>
                                        </table>

                                        <h4>Tổng:
                                            <?= number_format($tong['0']['tong']) ?> VNĐ
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-doanh-thu-ngay"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Thống kê đơn đặt hàng</h4>
                            </div>

                            <div id="chart-thong-ke-don"></div>
                            <div class="card-content pb-4">
                                <div class="p-2">
                                    <table class="table table-hover col-12 col-lg-12 col-md-12">
                                        <tr>
                                            <td>Tổng</td>
                                            <td>
                                                <?= $d[0]['dem'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Đã xác nhận</td>
                                            <td>
                                                <?= $daXacNhan[0]['dem'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Chưa xác nhận</td>
                                            <td>
                                                <?= $choXacNhan[0]['dem'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Đã hủy</td>
                                            <td>
                                                <?= $daHuy[0]['dem'] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </section>

    </div>