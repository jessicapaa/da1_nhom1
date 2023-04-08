<?php
$productId = getGet('id');
$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.id = $productId";
$product = executeResult($sql, true);

if (isset($productId)) {
	$sql = "update product set view = view + 1 where id = '$productId'";
	execute($sql);
}

$category_id = $product['category_id'];
$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = $category_id order by Product.updated_at desc limit 0,4";

$lastestItems = executeResult($sql);

?>

<!-- ... -->
<div class="container mt-[80px]">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.php?act=home" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="index.php?act=category&id=<?= $product['category_id'] ?>" class="stext-109 cl8 hov-cl1 trans-04">
			/ <?= $product['category_name'] ?>
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			/ <?= $product['title'] ?>
		</span>
	</div>
</div>
<!-- ... -->
<section class="sec-product-detail bg0 p-t-25 p-b-60 ">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-lg-6 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

						<div class="slick3 gallery-lb">
							<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
								<div class="wrap-pic-w pos-relative">
									<img class="h-[50%]" src="public/photo/<?= $product['thumbnail'] ?>" alt="IMG-PRODUCT">


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2 col-lg-5 p-b-30">

				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 font-bold text-XL js-name-detail p-b-14">
						<?= $product['title'] ?>
					</h4>
					<ul style="display: flex; list-style-type: none; margin: 0px; padding: 0px;">
						<li style="color: orange; font-size: 13pt; padding-top: 2px; margin-right: 5px;">5.0</li>
						<li style="color: orange; padding: 2px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
								<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
							</svg>
						</li>
						<li style="color: orange; padding: 2px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
								<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
							</svg>
						</li>
						<li style="color: orange; padding: 2px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
								<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
							</svg>
						</li>
						<li style="color: orange; padding: 2px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
								<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
							</svg>
						</li>
						<li style="color: orange; padding: 2px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
								<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
							</svg>
						</li>
						<li style="margin-left: 20px; border-left: solid #dad7d7 1px; font-size: 13pt; padding-top: 3px; padding-left: 20px;">7,635 Đã Bán</li>
					</ul>

					<h3 class="font-semibold my-4">Chi Tiết Sản Phẩm</h3>

					<p class="stext-102 cl3 p-t-5">
						<?= $product['description'] ?>
					</p>
					<p class="stext-102 cl3 p-t-5 font-bold text-md">
						Lượt xem : <?= $product['view'] ?>
					</p>


					<p style="font-size: 30px; color: red; margin-top: 15px; margin-bottom: 15px;">
						<?= number_format($product['discount']) ?> VND
					</p>
					<p style="font-size: 15px; color: grey; margin-top: 15px; margin-bottom: 15px;">
						<del><?= number_format($product['price']) ?> VND</del>
					</p>
					<div style="display: flex;">
						<div class="wrap-num-product flex-w m-r-20 m-tb-10">
							<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
								<i class="fs-16 zmdi zmdi-minus"></i>
							</div>

							<input class="mtext-104 cl3 txt-center num-product" type="number" name="num" value="1">

							<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
								<i class="fs-16 zmdi zmdi-plus"></i>
							</div>
						</div>
					</div>
					<!-- <div style="display: flex;">
						<button class="btn btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(-1)">-</button>
						<input type="number" name="num" class="mtext-104 num-product txt-center form-control" step="1" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;" onchange="fixCartNum()">
						<button class="btn btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(1)">+</button>
					</div> -->
					<button class="btn btn-success" style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 30px;" onclick="addCart(<?= $product['id'] ?>, $('[name=num]').val())">
						<i class="bi bi-cart-plus-fill"></i> THÊM VÀO GIỎ HÀNG
					</button>
					<button class="btn btn-secondary" style="margin-top: 20px; width: 100%; border-radius: 0px; font-size: 30px; background-color: #edebeb; border: solid #edebeb 1px; color: black;">
						<i class="bi bi-bookmark-heart-fill"></i> THÊM MỤC YÊU THÍCH
					</button>
				</div>

				<!--  -->

				<!--  -->
			</div>
		</div>
	</div>

	<div class="bor10 m-t-50 p-t-43 p-b-40">
		<!-- Tab01 -->
		<div class="tab01">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item p-b-10">
					<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
				</li>

				<li class="nav-item p-b-10">
					<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
				</li>

				<li class="nav-item p-b-10">
					<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content p-t-43">
				<!-- - -->
				<div class="tab-pane fade show active" id="description" role="tabpanel">
					<div class="how-pos2 p-lr-15-md">
						<p class="stext-102 cl6">
							<?= $product['description'] ?>
						</p>
					</div>
				</div>

				<!-- - -->
				<div class="tab-pane fade" id="information" role="tabpanel">
					<div class="row">
						<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
							<ul class="p-lr-28 p-lr-15-sm">
								<li class="flex-w flex-t p-b-7">
									<span class="stext-102 cl3 size-205">
										Weight
									</span>

									<span class="stext-102 cl6 size-206">
										0.79 kg
									</span>
								</li>

								<li class="flex-w flex-t p-b-7">
									<span class="stext-102 cl3 size-205">
										Dimensions
									</span>

									<span class="stext-102 cl6 size-206">
										110 x 33 x 100 cm
									</span>
								</li>

								<li class="flex-w flex-t p-b-7">
									<span class="stext-102 cl3 size-205">
										Materials
									</span>

									<span class="stext-102 cl6 size-206">
										60% cotton
									</span>
								</li>

								<li class="flex-w flex-t p-b-7">
									<span class="stext-102 cl3 size-205">
										Color
									</span>

									<span class="stext-102 cl6 size-206">
										Black, Blue, Grey, Green, Red, White
									</span>
								</li>

								<li class="flex-w flex-t p-b-7">
									<span class="stext-102 cl3 size-205">
										Size
									</span>

									<span class="stext-102 cl6 size-206">
										XL, L, M, S
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- - -->
				<div class="tab-pane fade" id="reviews" role="tabpanel">
					<div class="row">
						<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
							<div class="p-b-30 m-lr-15-sm">
								<!-- Review -->
								<div class="flex-w flex-t p-b-68">
									<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
										<img src="images/avatar-01.jpg" alt="AVATAR">
									</div>

									<div class="size-207">
										<div class="flex-w flex-sb-m p-b-17">
											<span class="mtext-107 cl2 p-r-20">
												Ariana Grande
											</span>

											<span class="fs-18 cl11">
												<i class="zmdi zmdi-star"></i>
												<i class="zmdi zmdi-star"></i>
												<i class="zmdi zmdi-star"></i>
												<i class="zmdi zmdi-star"></i>
												<i class="zmdi zmdi-star-half"></i>
											</span>
										</div>

										<p class="stext-102 cl6">
											Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
										</p>
									</div>
								</div>

								<!-- Add review -->
								<form class="w-full">
									<h5 class="mtext-108 cl2 p-b-7">
										Add a review
									</h5>

									<p class="stext-102 cl6">
										Your email address will not be published. Required fields are marked *
									</p>

									<div class="flex-w flex-m p-t-50 p-b-23">
										<span class="stext-102 cl3 m-r-16">
											Your Rating
										</span>

										<span class="wrap-rating fs-18 cl11 pointer">
											<i class="item-rating pointer zmdi zmdi-star-outline"></i>
											<i class="item-rating pointer zmdi zmdi-star-outline"></i>
											<i class="item-rating pointer zmdi zmdi-star-outline"></i>
											<i class="item-rating pointer zmdi zmdi-star-outline"></i>
											<i class="item-rating pointer zmdi zmdi-star-outline"></i>
											<input class="dis-none" type="number" name="rating">
										</span>
									</div>

									<div class="row p-b-25">
										<div class="col-12 p-b-5">
											<label class="stext-102 cl3" for="review">Your review</label>
											<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
										</div>

										<div class="col-sm-6 p-b-5">
											<label class="stext-102 cl3" for="name">Name</label>
											<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
										</div>

										<div class="col-sm-6 p-b-5">
											<label class="stext-102 cl3" for="email">Email</label>
											<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
										Submit
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>

	<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
		<span class="stext-107 cl6 p-lr-25">
			SKU: JAK-01
		</span>

		<span class="stext-107 cl6 p-lr-25">
			Categories: <?= $product['category_name'] ?>
		</span>
	</div>
</section>

<!-- Related Products -->


<section class="bg0 p-t-20 p-b-140">

	<div class="container">
		<div class="p-b-2 p-t-5 mb-5">
			<h3 class="ltext-103 cl5 text-center mb-2">
				Sản phẩm liên quan

			</h3>
		</div>

		<!-- hiện thị sản phẩm  -->
		<div class="row isotope-grid">
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
							<p class="w-full"><button class="mt-2 btn btn-success w-full" onclick="addCart(<?= $id ?>, 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>

						</div>
					</div>
				</div>

			<?php endforeach ?>
			<!-- modal quick view -->
			<div id="quickViewctn">
			</div>
		</div>
	</div>

</section>
<script>
	function addMoreCart(delta) {
		num = parseInt($('[name=num]').val())
		num += delta
		if (num < 1) num = 1;
		$('[name=num]').val(num)
	}

	function fixCartNum() {
		$('[name=num]').val(Math.abs($('[name=num]').val()))
	}
</script>