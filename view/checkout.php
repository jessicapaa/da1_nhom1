<div class="container mt-[90px]">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php?act=home" class="stext-109 cl8 hov-cl1 trans-04">
				Trang chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Giỏ hàng
			</span>
		</div>
	</div>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<form method="post" onsubmit="return completeCheckout();">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			  <input required="true" type="text" value="<?=!empty($_SESSION['user']['fullname']) ? $_SESSION['user']['fullname'] : ''   ?>" class="form-control" id="usr" name="fullname" placeholder="Nhập họ * tên">
			</div>
			<div class="form-group">
			  <input required="true" type="email" value="<?=!empty($_SESSION['user']['email']) ? $_SESSION['user']['email'] : ''   ?>" class="form-control" id="email" name="email" placeholder="Nhập email">
			</div>
			<div class="form-group">
			  <input required="true" type="tel" value="<?=!empty($_SESSION['user']['phone_number']) ? $_SESSION['user']['phone_number'] : ''   ?>" class="form-control" id="phone" name="phone" placeholder="Nhập sđt">
			</div>
			<div class="form-group">
			  <input required="true" type="text" value="<?=!empty($_SESSION['user']['address']) ? $_SESSION['user']['address'] : ''   ?>" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
			</div>
			<div class="form-group">
			  <label for="pwd">Nội dung:</label>
			  <textarea class="form-control" rows="3"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<table class="table table-bordered">
			<tr>
				<th>STT</th>
				<th>Tiêu Đề</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Tổng Giá</th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
foreach($_SESSION['cart'] as $item) {
	echo '<tr>
			<td>'.(++$index).'</td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['discount']).' VND</td>
			<td>
				'.$item['num'].'
			</td>
			<td>'.number_format($item['discount'] * $item['num']).' VND</td>
		</tr>';
}
?>
		</table>
		
		<a href="index.php?act=checkout"><button class="btn btn-success" style="border-radius: 0px; font-size: 26px; width: 100%;">THANH TOÁN</button></a>
		</div>
	</div>
</form>
</div>

<script type="text/javascript">
	function completeCheckout() {
		$.post('api/ajax_request.php', {
			'action': 'checkout',
			'fullname': $('[name=fullname]').val(),
			'email': $('[name=email]').val(),
			'phone_number': $('[name=phone]').val(),
			'address': $('[name=address]').val(),
			'note': $('[name=note]').val()
		}, function() {
			window.open('index.php?act=complete', '_self');
			
		})

		return false;
	}
</script>
