<div class="container mt-[90px]">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php?act=home" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Xác nhận
        </span>
    </div>
</div>
<div class="container mt-[80px]" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="table mt-[80px]">
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Ảnh sản phẩm</td>
                    <td>Tên</td>
                    <td>Gía</td>
                    <td>Số lượng</td>
                    <td>Tổng tiền</td>
                </tr>
            <tbody>
                <?php
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                $index = 0;
                foreach ($_SESSION['cart'] as $item) {
                    echo '<tr>
			<td>' . (++$index) . '</td>
			<td><img src="./public/photo/' . $item['thumbnail'] . '"style="height: 80px"/></td>
			<td>' . $item['title'] . '</td>
			<td>' . number_format($item['discount']) . ' VND</td>
			<td style="display: flex"><button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(' . $item['id'] . ', -1)">-</button>
				<input type="number" id="num_' . $item['id'] . '" value="' . $item['num'] . '" class="form-control" style="width: 90px; border-radius: 0px" onchange="fixCartNum(' . $item['id'] . ')"/>
				<button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(' . $item['id'] . ', 1)">+</button>
			</td>
			<td>' . number_format($item['discount'] * $item['num']) . ' VND</td>
		</tr>';
                }
	unset($_SESSION['cart']);

                ?>
            </tbody>
            </thead>
        </table>
    </div>
    <div class="row mt-[80px]">
        <div class="col-md-12" style="text-align: center;">
            <h1 class="text-4xl mb-[40px] font-bold" style="color: green">BẠN ĐÃ TẠO ĐƠN HÀNG THÀNH CÔNG!!!</h1>
            <h4 class="text-3xl font-semibold">Cảm ơn quý khách đã đặt mua sản phẩm của chúng tôi !
                Đơn hàng của quý khách sẽ được nhân viên gọi điện xác nhận kiểm tra và giao hàng trong thời gian sớm nhất.</h4>
            <a href="index.php?act=lichsu"><button class="btn btn-success my-[40px]" style="border-radius: 0px; font-size: 26px;">Kiểm tra lịch sử mua hàng</button></a>
        </div>
    </div>
</div>