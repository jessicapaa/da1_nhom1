<?php
$title = "Update danh mục ";
$baseURL = '';

$msg = $name = $id = '';

require_once('editor.php');


$sql = "SELECT * FROM category ";
$roleItem = executeResult($sql);

$id = getGet('id');
if ($id != '' && $id > 0) {
    $sql = "SELECT * from category where id = '$id'";
    $cateItem = executeResult($sql, true);
    if ($cateItem != null) {
        $name = $cateItem['name'];
    } else {
        $id = 0;
    }
} else {
    $id = 0;
}
?>

<div class="h-screen font-sans login bg-cover">
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">

        <div class="leading-loose">


            <form class="w-[700px]" method="POST" onsubmit="return validateForm();">
                <h1 class="text-[#106ba2] font-bold text-center text-[40px] mt-[]  font-bold">Cập nhật/thêm danh mục</h1>
                <p class="text-[red] font-medium text-center text-[25px]  font-bold">
                    <?= $msg; ?>
                </p>
                <input type="text" name="id" value="<?= $id ?>" hidden="true">
                <div class="mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                    <!-- <i class="mt-[-6px] ml-[8px] icon fa-regular fa-user text-[#106ba2]"></i> -->
                    <input type="text" name="name" class="text-[#106ba2] w-full  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" value="<?php echo $name; ?>" placeholder="Tên danh mục" />
                </div>
                <div class="mt-[30px] pb-[50px] items-center flex justify-between">
                    <button class="px-4 w-[700px] py-1 text-white font-light tracking-wider bg-[#106ba2] hover:opacity-70 rounded" type="submit">Thêm mới</button>
                </div>
            </form>

        </div>

    </div>
</div>
<script type="text/javascript">
   
</script>