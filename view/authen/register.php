<?php
session_start();
 require_once('../../connect/dbhelper.php');
 require_once('process_form_register.php');

 $user = getUserToken();
if($user != null) {
  header('Location: ../');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" type="text/css" href="public/css/main.css"> -->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .input {
            position: relative;
        }

        .icon {
            position: absolute;
            top: 22px;
            left: 7px;
        }
    </style>
</head>

<body>
    <div class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">

            <div class="leading-loose">


                <form class="w-[700px]" method="POST" onsubmit="return validateForm();">
                    <h1 class="text-[#106ba2] font-bold text-center text-[40px]  font-bold">Đăng ký</h1>
                    <p class="text-[#106ba2] font-medium text-center text-[15px] mb-[20px] font-bold">Đăng ký tài khoản để nhận ưu
                        đãi của...</p>
                        <p class="text-[red] font-medium text-center text-[25px] mb-[20px] font-bold">
                          <?=$msg;?>
                       </p>

                    <div class="mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                        <i class=" ml-[8px] icon fa-regular fa-user text-[#106ba2]"></i>
                        <input type="text" name="fullname" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Họ và tên" />
                    </div>

                    <div class="flex input items-center text-lg  mb-6 md:mb-8">
                        <i class="mt-[2px] ml-[8px] icon fa-regular fa-envelope text-[#106ba2]"></i>
                        <input type="email" name="email" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Email" />
                    </div>

                    <div class="mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                        <i class="mt-[2px] ml-[8px] icon fa-solid fa-phone-volume text-[#106ba2]"></i>
                        <input type="number" name="number" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Số điện thoại" />
                    </div>

                    <div class=" mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                        <i class="mt-[2px] ml-[8px] icon fa-solid fa-key text-[#106ba2]"></i>
                        <input type="password" id="pwd" name="password" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Mật khẩu" />
                    </div>

                    <div class=" mt-[15px] flex input items-center text-lg  mb-6 md:mb-8">
                        <i class="mt-[2px] ml-[8px] icon fa-solid fa-key text-[#106ba2]"></i>
                        <input type="password" id="confirmation_pwd" name="cfPassword" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Xác nhận mật khẩu" />
                    </div>
                         <P> <a class="text-[blue] font-semibold hover:underline" href="login.php">Tôi đã có tài khoản </a></P>
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
            if($passWord != $confirmPwd) {
                alert('Mật khẩu không khớp, vui lòng kiểm tra lại ');
                return flase;
            }
        }
    </script>
</body>

</html>