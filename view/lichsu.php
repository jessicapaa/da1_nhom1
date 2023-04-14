<?php
$sql = "SELECT orders.id,product.thumbnail, product.title, product.discount, order_details.num, order_details.total_money,orders.status
  from order_details JOIN orders ON order_details.order_id = orders.id JOIN product on order_details.product_id = product.id";

$result = executeResult($sql);


$result_up = array_reduce($result, function ($a, $b) {
    $a[$b['id']][] = $b;
    return $a;
}, array());

?>

<div class="container mt-[90px]">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php?act=home" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Lịch sử
        </span>
    </div>
</div>
<div class="container mt-[80px]" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">STT</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Giá</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Số lượng</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Trạng thái đơn hàng</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Ngày đặt</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tổng tiền</th>
                </tr>
            </thead>
            <tbody class=" divide-gray-100 border-t border-gray-100">
                <?php $index =1?>
                        <?php foreach ($result_up as $order) :
                            foreach ($order as $order_detail) : ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?= $index++?></td>
                                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                        <div class="relative h-10 w-10">
                                            <img class="" src="public/photo/<?= $order_detail['thumbnail'] ?>" alt="" width="70px">
                                        </div>
                                    </th>
                                    <td class="px-6 py-4"><?= $order_detail['title'] ?></td>
                                    <td class="px-6 py-4"><?= $order_detail['discount'] ?></td>
                                    <td class="px-6 py-4"><?= $order_detail['num'] ?></td>
                                    <td class="px-6 py-4"><?= $order_detail['total_money'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
</div>