<?php
require_once('../connect/config.php');
require_once('../connect/dbhelper.php');
require_once('../utlis/utility.php');
$id = getGet('id');
$sql = "SELECT * FROM product where `id` = '$id'";
$lastestItems = executeResult($sql);
?>


<?php foreach ($lastestItems as $item) : ?>
<div class="wrap-modal1 bg[#ccc] js-modal1 p-t-60 p-b-20" id="closeX">

    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">

        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img id="close" src="./public/images/icons/icon-close.png" alt="CLOSE">
            </button>
            <div class="row">
           
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="./public/images/product-detail-01.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="./public/photo/<?=$item['thumbnail']?>" alt="IMG-PRODUCT">

        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                             <?= $item['title'] ?>
                        </h4>

                        <span class="mtext-106 cl2 text-md line-through cl3 text-[red]">
							<?= number_format($item['price']) ?> VNĐ

                        </span>
                        <br>
                        <span class="mtext-106 text-lg cl3 text-[green] cl2">
									<?= number_format($item['discount']) ?> VNĐ

                        </span>

                        <p class="stext-102 cl3 p-t-23">
                        <?= $item['description'] ?>

                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <button class="ize-204 flex-w flex-c-m text-center flex-m respon6-next stext-101 cl0 size-101 bg1 bor1 hov-btn1 trans-04 js-addcart-detail">
                                        <a href="index.php?act=detail&id=<?=$item['id']?>" class="">Chi tiết sản phẩm</a>
                                    </button>
                                </div>

                            </div>
                        </div>


                        <!--  -->
                    </div>

                </div>
            </div>

        </div>

    </div>
    
</div>
<?php endforeach ?>

