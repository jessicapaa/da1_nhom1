<?php
require_once ('../../utlis/utility.php');
$fullname = $email = $msg = '';

if(isset($_POST['submit'])) {
    $email = getPost('email');
    $password = getPost('password');

    $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password' ";
    $userExist = executeResult($sql, true);

    if($userExist == null) {
        $msg = "Đăng nhập không thành công, vui lòng kiểm tra tài khoản hoặc mật khẩu";
    }else {

        $token = $userExist['email'].time();

        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
        $created_at = date('Y-m-d H:i:s');

        $_SESSION['user'] = $userExist; 

        $userId = $userExist['id'];
        
        $sql = "INSERT INTO tokens (user_id , token, created_at) 
        values ('$userId', '$token', '$created_at')";
        execute($sql);
        // login thành công
        header('Location: ../index.php');
        die();
    }

}