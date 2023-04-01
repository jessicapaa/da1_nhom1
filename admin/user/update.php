<?php
$title = "Update tài khoản ";
$baseURL = '';

$msg = $fullname = $email = $phone_number = $address = $role_id = $id = '';

require_once('editor.php');


$sql = "SELECT * FROM role ";
$roleItem = executeResult($sql);

$id = getGet('id');
if ($id != '' && $id > 0) {
    $sql = "SELECT * from user where id = '$id'";
    $userItem = executeResult($sql, true);
    if ($userItem != null) {
        $fullname = $userItem['fullname'];
        $email = $userItem['email'];
        $number = $userItem['phone_number'];
        $address = $userItem['address'];
        $role_id = $userItem['role_id'];
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
                <h1 class="text-[#106ba2] font-bold text-center text-[40px] mt-[]  font-bold">Cập nhật tài khoản</h1>
                <p class="text-[red] font-medium text-center text-[25px]  font-bold">
                    <?= $msg; ?>
                </p>
                <input type="text" name="id" value="<?= $id ?>" hidden="true">
                <div class="mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                    <i class="mt-[-6px] ml-[8px] icon fa-regular fa-user text-[#106ba2]"></i>
                    <input type="text" name="fullname" class="text-[#106ba2] w-full  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" value="<?php echo $fullname; ?>" placeholder="Họ và tên" />
                </div>


                <div class="flex input items-center text-lg  mb-6 md:mb-8">
                    <i class="mt-[-6px] ml-[8px] icon fa-regular fa-envelope text-[#106ba2]"></i>
                    <input type="email" name="email" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Email" value="<?= $email ?>" />
                </div>

                <div class="flex input items-center text-lg  mb-6 md:mb-8">
                    <select class="form-control" name="role_id" id="role_id" required>
                        <option value="">--Chọn--</option>
                        <?php
                        foreach ($roleItem as $role) {
                            if ($role['id'] == $role_id) {
                                echo '<option selected value="' . $role['id'] . '">' . $role['name'] . '</option>';
                            } else {
                                echo '<option value="' . $role['id'] . '">' . $role['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                    <i class="mt-[-6px] ml-[8px] icon fa-solid fa-phone-volume text-[#106ba2]"></i>
                    <input type="number" name="number" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Số điện thoại" value="<?= $number; ?>" />
                </div>

                <div class="mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                    <i class="mt-[-6px] ml-[8px] icon fa-solid fa-phone-volume text-[#106ba2]"></i>
                    <input type="text" name="address" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Địa chỉ" value="<?= $address ?>" />
                </div>

                <div class=" mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                    <i class="mt-[-6px] ml-[8px] icon fa-solid fa-key text-[#106ba2]"></i>
                    <input <?= ($id > 0 ? '' : 'required="true"') ?> type="password" id="pwd" name="password" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Mật khẩu" />
                </div>

                <div class=" mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                    <i class="mt-[-6px] ml-[8px] icon fa-solid fa-key text-[#106ba2]"></i>
                    <input <?= ($id > 0 ? '' : 'required="true"') ?> type="password" id="confirmation_pwd" name="cfPassword" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Xác nhận mật khẩu" />
                </div>
                <div class="mt-[30px] pb-[50px] items-center flex justify-between">
                    <button class="px-4 w-[700px] py-1 text-white font-light tracking-wider bg-[#106ba2] hover:opacity-70 rounded" type="submit">ĐĂNG KÝ</button>
                </div>

            </form>

        </div>

    </div>
</div>
<script type="text/javascript">
    function validateForm() {
        $passWord = $('#pwd').val();
        $confirmPwd = $('#confirmation_pwd').val();
        if ($passWord != $confirmPwd) {
            alert('Mật khẩu không khớp, vui lòng kiểm tra lại ');
            return flase;
        }
    }
</script>