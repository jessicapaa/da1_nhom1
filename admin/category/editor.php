<?php
require_once('../utlis/utility.php');

if (!empty($_POST)) {
    $id = getPost('id');
    $name = getPost('name');


    if ($id > 0) {
        //update
        $sql = "SELECT * FROM category where name = '$name'";
        $cateItem = executeResult($sql, true);

        if ($cateItem != null) {
            $msg = 'Danh mục đã tồn tại, vui lòng thêm danh mục khác ';
        } else {
            $sql = "update category set name = '$name' where id = '$id'";
            execute($sql);
            header('Location: index.php');
            die();
        }
    } else {
            // insert
            $sql = "INSERT INTO category(name) values('$name')";
            execute($sql);
            header('Location: index.php');
            die();
    }
}
