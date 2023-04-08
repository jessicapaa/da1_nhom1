<?php
session_start();

require_once('../../utlis/utility.php');
require_once '../../connect/dbhelper.php';
require_once 'process_form_login.php';

$user = getUserToken();
if($user != null) {
  header('Location: ../');
  die();
}
?>

  <div class="h-screen font-sans login bg-cover">
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">

      <div class="leading-loose">


        <form class="w-[700px]" method="POST">
          <h1 class="text-[#106ba2] font-bold text-center text-[40px] mb-[20px] font-bold">Đăng nhập</h1>
          <p class="text-[#106ba2] font-medium text-center text-[15px] mb-[20px] font-bold">Đăng nhập vào abc</p>
          <p class="text-[red] font-medium text-center text-[25px] mb-[20px] font-bold">
            <?= $msg; ?>
          </p>
          <div class="flex input items-center text-lg  mb-6 md:mb-8">
            <i class="ml-[8px] mt-[2px] icon fa-regular  fa-envelope text-[#106ba2]"></i>
            <input name="email" type="email" id="email" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Email" />
          </div>

          <div class=" mt-[25px] flex input items-center text-lg  mb-6 md:mb-8">
            <i class="ml-[8px] mt-[2px] icon fa-solid fa-key text-[#106ba2]"></i>
            <input name="password" type="password" id="password" class="text-[#106ba2]  pl-[40px] rounded-md border bordder-[#E9EDF4] py-2 md:py-4 focus:outline-none w-full" placeholder="Mật khẩu" />
          </div>



          <div class="mt-[30px] items-center flex justify-between">
            <button name="submit" class="px-4 w-[700px] py-1 text-white font-light tracking-wider bg-[#106ba2] hover:opacity-70 rounded" type="submit">ĐĂNG NHẬP</button>
          </div>
          <div class="forgot mt-[30px]">
            <a href="register.php" class="text-base mb-2  text-[blue] hover:underline hover:text-primary">Chưa có tài khoản ? đăng ký
            </a>
          </div>
          <a href="" class="text-base mb-2 text-[#adadad] hover:underline hover:text-primary hover:text-[green]">Quên mật khẩu?
          </a>
          <br>

        </form>

      </div>

    </div>
  </div>
