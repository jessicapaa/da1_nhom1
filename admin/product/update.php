<?php
$title = "Update tài khoản ";
// $baseURL = '';

$id = $thumbnail = $title = $price = $discount = $category_id = $description = '';
require_once($baseURL . 'layouts/header.php');

require_once('editor.php');


$sql = "SELECT * FROM category ";
$cateItem = executeResult($sql);

$id = getGet('id');
if ($id != '' && $id > 0) {
    $sql = "SELECT * from product where id = '$id' and deleted = 0";
    $userItem = executeResult($sql, true);
    if ($userItem != null) {
        $thumbnail = $userItem['thumbnail'];
        $title = $userItem['title'];
        $price = $userItem['price'];
        $discount = $userItem['discount'];
        $category_id = $userItem['category_id'];
        $description = $userItem['description'];
    } else {
        $id = 0;
    }
} else {
    $id = 0;
}
?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="font-semibold text-xl">Sản phẩm</div>
                    <a href="index.php?act=listProduct" class="btn btn-primary my-3">Danh sách sản phẩm
                    </a>
                </div>
<div class="h-screen font-sans login bg-cover">
    <div class="container mx-auto flex flex-1 justify-center items-center">

        <div class="leading-loose">


            <form class="w-[750px]" method="POST" enctype="multipart/form-data">
                <h1 class="text-[#106ba2] font-bold text-center text-[40px] mt-[]  font-bold">Thêm sửa sản phẩm </h1>

                <input type="text" name="id" value="<?= $id ?>" hidden="true">

                <div class="mt-[15px]  input items-center text-lg  mb-6 md:mb-8">
                    <input type="text" name="title" class="text-[#106ba2] w-full  form-control rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" value="<?php echo $title; ?>" placeholder="Tên sản phẩm" />
                    <span class="text-danger"><?php echo $message = isset($error['title']) && !empty($error['title']) ? $error['title'] : "" ?></span>

                </div>

                <div class=" input items-center text-lg  mb-6 md:mb-8">
                    <select class="form-control" name="category_id" id="category_id" >
                        <option value="">--Chọn danh mục sản phẩm--</option>
                        <?php
                        foreach ($cateItem as $item) {
                            if ($item['id'] == $category_id) {
                                echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                            } else {
                                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <span class="text-danger"><?php echo $message = isset($error['category_id']) && !empty($error['category_id']) ? $error['category_id'] : "" ?></span>


                </div>

                <div class="mt-[15px]  input items-center text-lg  mb-6 md:mb-8">
                    <input type="number"  name="price" style="position: unset;" class=" text-[#106ba2]  form-control rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Gía" value="<?= $price; ?>" />
                    <span class="text-danger"><?php echo $message = isset($error['price']) && !empty($error['price']) ? $error['price'] : "" ?></span>

                </div>

                <div class="mt-[15px]  input items-center text-lg  mb-6 md:mb-8">
                    <input type="number" name="discount" class="text-[#106ba2]  form-control rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Giảm giá" value="<?= $discount ?>" />
                    <span class="text-danger"><?php echo $message = isset($error['discount']) && !empty($error['discount']) ? $error['discount'] : "" ?></span>

                </div>

                <div class=" input items-center text-lg  mb-6 md:mb-4">
                    <input type="file" name="image" class="text-[#106ba2] form-control  rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Thumbnail" value="<?= $thumbnail ?>" />
                    <img id="thumbnail_id" class="text-center algin-center" src="<?= $thumbnail ?>" style="max-height: 160px; margin-top: 10px;" alt="" onchange="updateThumbnail()">
                    <span class="text-danger"><?php echo $message = isset($error['image']) && !empty($error['image']) ? $error['image'] : "" ?></span>

                </div>

                <div class=" input items-center text-lg  mb-6 md:mb-8">
                    <br>
                    <textarea class="form form-control" id="description" placeholder="Nội dung" name="description" id="" cols="30" rows="10"><?= $description ?></textarea>
                    <span class="text-danger"><?php echo $message = isset($error['description']) && !empty($error['description']) ? $error['description'] : "" ?></span>
                    
                </div>

                <div class="mt-[30px] pb-[50px] items-center  justify-between">
                    <input type="submit" value="Lưu thông tin sản phẩm" name="themmoi" class="px-4 w-[700px] form-control py-1 text-white font-light tracking-wider bg-[#106ba2] hover:opacity-70 rounded" type="submit"></input>
                </div>

            </form>

        </div>

    </div>
</div>
<script type="text/javascript">
    function updateThumbnail() {
        $('#thumbnail_id').attr('src', $('#thumbnail').val());
    }
</script>
<script>
    $('#description').summernote({
    placeholder: 'Nhập nội dung dữ liệu',
    tabsize: 2,
    height: 300,
    toolbar: [
        ['style',['style']],
        ['font',['bold' ,'underline', 'clear']],
        ['color',['color']],
        ['para',['ul' ,'ol', 'paragraph']],
        ['table',['table']],
        ['insert',['link' ,'picture', 'video']],
        ['view',['fullscreen' ,'codeview', 'help']],
    ]
 });

</script>
<?php 
// require_once '
require_once($baseURL . 'layouts/footer.php');
