<?php
require_once('../../utlis/utility.php');
$fullname = $email = '';
$msg = '';

if(!empty($_POST)) {
    $fullname = getPost('fullname');
    $email = getPost('email');
    $number = getPost('number');
    $password = getPost('password');
     
    // check lỗi 
    if(empty($fullname) || empty($email) || empty($number) || empty($password) || strlen($password) < 6) {

    }else {
        // validate thành công 
        $userExist = executeResult("select * from  user where email = '$email' ",true );
        if($userExist != null ) {
            $msg = "Email đã được đăng ký trên hệ thống "; 
        }else {
            $created_at = $updated_at = date('Y-m-d H:i:s');

            
             $sql = "INSERT INTO `user` (`fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`)
              VALUES ( '$fullname', '$email', '$number', '0', '$password', '2','$created_at' ,'$updated_at' , 0)" ;
             execute($sql);
             header('Location: login.php');
            //  die();
        }
    }
}