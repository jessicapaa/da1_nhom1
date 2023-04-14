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
    <div class="table">
        <table class="table">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Sản phẩm</td>
                    <td></td>
                    <td>Gía</td>
                    <td>Số lượng</td>
                    <td>Trạng thái</td>
                
                    <td colspan="2">Tổng tiền</td>
                </tr>
            <tbody>
                <?php
                $stt = 0;
                foreach ($result_up as $order) :
                    $stt++;
                ?>
                    <tr>
                        <td>
                            <?= $stt; ?>
                        </td>
                        <td colspan="5">

                        <?php foreach ($order as $order_detail) : ?>
                               
                                <div class="row">

                                    <div class="col-4 flex mb-1 gap-3">
                                        <div>
                                            <img class="" src="public/photo/<?= $order_detail['thumbnail'] ?>" alt="" width="70px">
                                        </div>

                                        <div>
                                            <?= $order_detail['title'] ?>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <?= $order_detail['discount'] ?>
                                    </div>
                                    <div class="col-3">
                                        <?= $order_detail['num'] ?>
                                    </div>
                                    <div class="col"><?= $order_detail['total_money'] ?></div>
                                </div>



                            


                        <?php endforeach; ?>
                        </td>

                    </tr>


                <?php endforeach ?>
            </tbody>
            </thead>
        </table>
    </div>
</div>