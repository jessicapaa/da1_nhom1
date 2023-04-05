<?php
$title = 'Thông Tin Chi Tiết Đơn Hàng';
// $baseUrl = '../';
require_once($baseURL . 'layouts/header.php');


$orderId = getGet('id');

$sql = "select order_details.*, product.title, product.thumbnail from order_details left join product on product.id = order_details.product_id where order_details.order_id = $orderId";
$data = executeResult($sql);

$sql = "select * from orders where id = $orderId";
$orderItem = executeResult($sql, true);
?>

<div class="row w-[80%]" style="margin-top: 20px; float:right;">
    <div class="col-md-12">
        <h1 class="col-md-12 text-xl font-bold">Chi tiết đơn hàng</h1>

        <a href="index.php?act=listOrder" class="btn btn-primary my-3 bg-[green]"> Danh sách đơn hàng
        </a>
    </div>
    <div class="col-md-8 table-responsive">
        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thumbnail</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($data as $item) {
                    echo '<tr>
					<th>' . (++$index) . '</th>

					<td><img src="../public/photo' . $item['thumbnail'] . '" style="height: 120px"/></td>
					<td>' . $item['title'] . '</td>
					<td>' . $item['price'] . '</td>
					<td>' . $item['num'] . '</td>
					<td>' . $item['total_money'] . '</td>
				</tr>';
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Tổng Tiền</th>
                    <th><?= $item['total_money'] ?></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <tr>
                <th>Họ & Tên: </th>
                <td><?= $orderItem['fullname'] ?></td>
            </tr>
            <tr>
                <th>Email: </th>
                <td><?= $orderItem['email'] ?></td>
            </tr>
            <tr>
                <th>Địa Chỉ: </th>
                <td><?= $orderItem['address'] ?></td>
            </tr>
            <tr>
                <th>Phone: </th>
                <td><?= $orderItem['phone_number'] ?></td>
            </tr>
        </table>
    </div>
</div>
<?php
require_once($baseURL . 'layouts/footer.php');

?>