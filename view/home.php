<?php
require_once('view/header.php');
require_once('view/banner.php');


$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id order by product.updated_at desc limit 0,8";

// $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by product.view desc limit 9";
$lastestItems = executeResult($sql);
?>

<!-- Product -->

<section class="bg0 p-t-23 p-b-50">

	<div class="container">
		<div class="p-b-10 p-t-5 flex justify-between">
			<h3 class="ltext-103 cl5 p-t-14">
				Sản phẩm mới ra mắt
			</h3>
			<div class="flex-w flex-sb-m p-b-52  ">
			<div class="flex-w flex-c-m m-tb-10 ">
				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>

			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15 ">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>
			</div>
		</div>
		</div>

		



		<div class="row isotope-grid">
			<!-- hiện thị sản phẩm  -->
			<?php foreach ($lastestItems as $item) :
				$id = $item['id'];
				$quickView = "index.php?act=quickView&id=$id";
			?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="public/photo/<?= $item['thumbnail'] ?>" alt="IMG-PRODUCT">
							<a href="<?= $quickView ?>" id="<?= $id ?>" class="btn-quick block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="index.php?act=detail&id=<?= $item['id'] ?>" class="text-xl font-aria stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $item['title'] ?>
								</a>

								<span class="stext-105 text-md line-through cl3 text-[red]">
									<?= number_format($item['price']) ?>VNĐ

								</span>
								<h1 class="stext-105 text-lg float-right cl3">
									<?= number_format($item['discount']) ?>VNĐ
								</h1>

							</div>

							<div class="block2-txt-child2  p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="public/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="public/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>

						</div>
					</div>
				</div>
			<?php endforeach ?>
			<!-- modal quick view -->
			<div id="quickViewctn">
			</div>
		</div>

		<!-- Load more -->
		<!-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
	</div>
				</a>
			</div> -->
	</div>

</section>

<!-- danh mục sản phẩm -->
<?php
$count = 0;
foreach ($menuItems as $item) {
	$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = " . $item['id'] . " order by Product.updated_at desc limit 0,4";
	$items = executeResult($sql);
	if ($items == null || count($items) < 4) continue;
?>
	<div style="background-color: <?= ($count++ % 2 == 0) ? '#f7f9fa' : '' ?>;">
		<section class="bg0 p-t-23 p-b-30">
			<div class="container">
				<div class="p-b-10">
					<h3 class="ltext-103 cl5 my-[20px] text-center">
						<?= $item['name'] ?>
					</h3>
				</div>
				<div class="row isotope-grid">

					<?php
					foreach ($items as $pItem) {
						$id = $pItem['id'];
						$quickView = "index.php?act=quickView&id=$id";

						echo
						'<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
		           <div class="block2">
			        <div class="block2-pic hov-img0">
				<img src="public/photo/' . $pItem['thumbnail'] . '" alt="IMG-PRODUCT">
				<a href="' . $quickView . '" id="' . $id . '" class="btn-quick block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
					Quick View
				</a>
			</div>

			<div class="block2-txt flex-w flex-t p-t-14">
				<div class="block2-txt-child1 flex-col-l ">
					<a href="index.php?act=detail&id=' . $pItem['id'] . '" class="text-xl font-aria stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
						' . $pItem['title'] . '
					</a>

					<span class="stext-105 text-md line-through cl3 text-[red]">
						' . number_format($pItem['price']) . 'VNĐ
						 

					</span>
					<h1 class="stext-105 text-lg float-right cl3">
						' . number_format($pItem['discount']) . ' VNĐ

					</h1>

				</div>

				<div class="block2-txt-child2  p-t-3">
					<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
						<img class="icon-heart1 dis-block trans-04" src="public/images/icons/icon-heart-01.png" alt="ICON">
						<img class="icon-heart2 dis-block trans-04 ab-t-l" src="public/images/icons/icon-heart-02.png" alt="ICON">
					</a>
				</div>

			</div>
		</div>
	</div>';
					} ?>

					<div id="quickViewctn">
					</div>'
				</div>
			</div>
	</div>
	</section>
<?php
}
?>



<!-- huhu -->


<script>
	let btnQuick = document.querySelectorAll('.btn-quick');
	let quickView = document.querySelector('#quickViewctn');

	console.log(quickView);
	//    console.log(btnQuick);
	btnQuick.forEach(btn => {
		btn.onclick = () => {
			console.log(btn.getAttribute('id'));
			fetch('./view/quick_view.php?id=' + btn.getAttribute('id'))
				.then(res => res.text())
				.then(data => {
					console.log(quickView);
					quickView.insertAdjacentHTML('afterend', data);
					// quickView.innerHTML = data;
					let closebtn = document.getElementById('close');
					let xoaCtn = document.getElementById('closeX');

					closebtn.onclick = () => xoaCtn.remove();

				})
		}
	});
</script>