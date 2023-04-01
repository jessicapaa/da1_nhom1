<?php
require_once('../utlis/utility.php');

if (!empty($_POST)) {
    $id = getPost('id');
    $fullname = getPost('fullname');
    $email = getPost('email');
    $phone_number = getPost('number');
    $address = getPost('address');
    $password = getPost('password');
    $role_id  = getPost('role_id');
    $created_at = $updated_at = date('Y-m-d H:i:s');

    
    if ($id > 0) {
        //update
        $sql = "SELECT * FROM user where email = '$email' and id <> '$id'";
    $userItem = executeResult($sql, true);

    if($userItem !=null) {
        $msg = 'Email đã tồn tại, vui lòng chọn email khác ';

    }else {
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
        // header('Location: index.php');
        header('Location:index.php?act=listUser');

        die();
    }
        
    } else {
        // insert
        if ($userItem == null) {

            $sql = "INSERT INTO `user` (`fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`)
                    VALUES ( '$fullname', '$email', '$phone_number', '$address', '$password', '$role_id','$created_at' ,'$updated_at' , 0)";
            execute($sql);
            header('Location:index.php?act=listUser');
            die();
        } else {
            $msg = 'Email đã được đăng ký ';
        }
    }
}
