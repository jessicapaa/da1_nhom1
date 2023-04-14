<?php
session_start();
require_once('utlis/utility.php');
require_once('connect/dbhelper.php');

$sql = "select * from Category";
$menuItems = executeResult($sql);

$user = getUserToken();
// '  <pre>  ';
// print_r($user);

// ' </pre>  ';
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$count = 0;
// var_dump($_SESSION['cart']);
foreach ($_SESSION['cart'] as $item) {
	$count += $item['num'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="public/images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/animsition/css/">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/css/util.css">
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="auth.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
 .input {
      position: relative;
    }

    .icon {
      position: absolute;
      top: 22px;
      left: 7px;
    }
	
	.huhu:hover + .btnH {
  	display: block;
	}

	.btnH {
  	display: none;
	}


	</style>
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container ">
					<div class="left-top-bar">
						Miễn phí đơn hàng với hóa đơn trên 1 triệu
					</div>

					<div class="col-lg-4 col-md-2 d-none d-lg-block text-right">

						<!-- <a href="#" class="flex-c-m trans-04 p-lr-25 fs-14">
							Hỗ trợ & Hỏi đáp
						</a> -->
						<!-- 
						<a href="index.php?act=login" class="flex-c-m trans-04 p-lr-25">
							ĐĂNG NHẬP
						</a>
						<a href="index.php?act=register" class="flex-c-m trans-04 p-lr-25 m-ll-25">
							ĐĂNG KÝ
						</a> -->
						<?php if (!empty($user)) : ?>
							<p class="m-0 pl-[30px] pb-[15px] text-white huhu ">Xin chào <a href=""><?= $user['fullname'] ?></a>

  								<div class="btnH">
    								<button>
										<?php if ($user['role_id'] == 2) : ?>
											<a class="py-1 px-2 mt-2 rounded btn-secondary" href="admin">Trang quản trị</a>
										<?php endif; ?>
									</button>
									<button>
										<a class="py-1 px-2 mt-2 rounded btn-secondary" href="index.php?act=logout">Lịch sử đơn hàng</a>
									</button>
    								<button>
										<a class="py-1 px-2 mt-2 rounded btn-danger" href="index.php?act=logout">Đăng xuất</a>
									</button>
  								</div>
							</p>
							<div>
								
								
							</div>
						<?php else : ?>
							<a href="index.php?act=login" class="btn rounded p-2 me-2">Đăng nhập</a>
							<a href="index.php?act=register" class="btn btn-secondary rounded p-2" style="background: #6c757d;">Đăng ký</a>
						<?php endif; ?>


					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="index.php?act=home" class="logo">
						<img src="public/images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php?act=home">Trang chủ</a>
								<!-- <ul class="sub-menu">
									<li><a href="index.html">Homepage 1</a></li>
									<li><a href="home-02.html">Homepage 2</a></li>
									<li><a href="home-03.html">Homepage 3</a></li>
								</ul> -->
							</li>

							<li>
								<a href="index.php?act=shop">Shop</a>
							</li>

							<!-- <li  class="label1" data-label1="hot">
								<a href="blog.html">Tin tức</a>
							</li> -->
							<?php
							foreach ($menuItems as $item) {
								echo '<li>
				                 <a href="index.php?act=category&id=' . $item['id'] . '">' . $item['name'] . '</a>
				                      </li>';
							}
							?>

							<li>
								<a href="index.php?act=contact">Liên hệ</a>
							</li>
							<li>
								<a href="index.php?act=lichsu">Lịch sử đơn hàng</a>
							</li>

						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>


						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $count ?>">
							<!-- <span><?= $count ?></span> -->
							<a href="index.php?act=cart">
								<i class="zmdi zmdi-shopping-cart">
								</i>
							</a>

						</div>

						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="public/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Trang chủ </a>

					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="index.php?act=shop">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="public/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
	<div id="quickViewctn">
	</div>