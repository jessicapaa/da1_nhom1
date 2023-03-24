<?php
require_once('../../utlis/utility.php');

if (!empty($_POST)) {
    $id = getPost('id');
    $fullname = getPost('fullname');
    $email = getPost('email');
    $phone_number = getPost('number');
    $address = getPost('address');
    $password = getPost('password');
    $role_id  = getPost('role_id');
    $created_at = $updated_at = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM user where email = '$email'";
    $userItem = executeResult($sql, true);
    if ($id > 0) {
        //update
        if ($password != '') {
            $sql = "UPDATE user SET 
            fullname = '$fullname',
            email = '$email',
            phone_number = '$phone_number',
            address = '$address',
            password = '$password',
            role_id = '$role_id',
            updated_at = '$updated_at'
            WHERE id = '$id'";
        } else {
            $sql = "UPDATE user SET 
            fullname = '$fullname',
            email = '$email',
            phone_number = '$phone_number',
            address = '$address',
            role_id = '$role_id',
            updated_at = '$updated_at'
            WHERE id = '$id'";
        }
        execute($sql);
        header('Location: index.php');
        die();
    } else {
        // insert
        if ($userItem == null) {

            $sql = "INSERT INTO `user` (`fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`)
                    VALUES ( '$fullname', '$email', '$phone_number', '$address', '$password', '$role_id','$created_at' ,'$updated_at' , 0)";
            execute($sql);
            header('Location: index.php');
            die();
        } else {
            $msg = 'Email đã được đăng ký ';
        }
    }
}
