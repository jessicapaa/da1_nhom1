<?php
$category_id = getGet('id');

if ($category_id == null || $category_id == '') {
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id order by Product.updated_at desc limit 0,12";
} else {
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = $category_id order by Product.updated_at desc limit 0,12";
}

$lastestItems = executeResult($sql);
?>
<section class="bg0 p-t-20 p-b-140 mt-[150px]">

    <div class="container">
        <div class="p-b-2 p-t-5 mb-5">
            <h3 class="text-[green] ltext-103 cl5 text-center mb-2">
                <?php
                if ($category_id == 1) {
                    echo 'Áo nam';
                } else {
                    echo 'Áo nữ';
                }
                ?>
            </h3>
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
                            <!-- <a href="<?= $quickView ?>" id="<?= $id ?>" class="btn-quick block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a> -->
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

        <!-- Load more -->
        <!-- <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
</div>
            </a>
        </div> -->
    </div>

</section>