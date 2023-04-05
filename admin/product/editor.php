<?php

if (isset($_POST['themmoi']) && $_POST['themmoi']) {
     $id = getPost('id');
     $title  = getPost('title');
     $price = getPost('price');
     $discount = getPost('discount');
     $thumbnail = $_FILES['image']['name'];
     $description = getPost('description');
     $category_id = getPost('category_id');
     $created_at = $updated_at = date('Y-m-d H:i:s');
     $error = [];

     $messageEmpty = "Trường này không được để trống";
     if (empty($title)) {
          $error['title'] = $messageEmpty;
     }

     if (empty($price)) {
          $error['price'] = $messageEmpty;
     } else {
          if (!is_numeric($price)) {
               $error['price'] = "Vui lòng nhập số";
          } else if ($price <= 0) {
               $error['price'] = "Giá sản phẩm phải lớn hơn 0";
          }
     }

     if (empty($discount)) {
          $error['discount'] = $messageEmpty;
     } else {
          if (!is_numeric($discount)) {
               $error['discount'] = "Vui lòng nhập số";
          } else if ($discount <= 0) {
               $error['discount'] = "số lượng sản phẩm phải lớn hơn 0";
          }
     }

     $duoiAnh = ['jpg', 'png', 'gif', 'jpeg'];
     if (!empty($thumbnail)) {
          $image_tmp = $_FILES['image']['tmp_name'];
          $image_size = $_FILES['image']['size'];

          $file_extension = explode('.', $thumbnail);
          $file_extension = strtolower(end($file_extension));
          if (in_array($file_extension, $duoiAnh)) {
               if ($image_size < 2000000) {
                    move_uploaded_file($image_tmp, '../public/photo/' . $thumbnail);
               } else {
                    $error['image'] = "File ảnh lớn quá";
               }
          } else {
               $error['image'] = "File ảnh không đúng định dạng";
          }
     }else {
          if($id > 0) {
          } else {
          $error['image'] = $messageEmpty;
          }
     }
     
     if (empty($description)) {
          $error['description'] = $messageEmpty;
     }
     if (empty($category_id)) {
          $error['category_id'] = $messageEmpty;
     }

     if (empty($error)) {
          if ($id > 0) {
               // update
               if($thumbnail != '') {
                    $sql = "UPDATE product set 
                    thumbnail = '$thumbnail',
                    title = '$title',
                    price = '$price',
                    discount = '$discount',
                    description  = '$description',
                    updated_at = '$created_at',
                    created_at = '$updated_at',
                    category_id = '$category_id'
                    where id = '$id'";
               }else {
                    $sql = "UPDATE product set 
                    title = '$title',
                    price = '$price',
                    discount = '$discount',
                    description  = '$description',
                    updated_at = '$created_at',
                    created_at = '$updated_at',
                    category_id = '$category_id'
                    where id = '$id'";
               }
               execute($sql);
               // header('Location :index.php?act=listProduct');
          } else {
               // insert
               $sql = "
         insert into product (thumbnail,title,price,discount,description,created_at,updated_at,category_id,deleted)
         values ('$thumbnail', '$title', '$price', '$discount','$description', '$created_at', '$updated_at', '$category_id',0)";

               execute($sql);
               // header('Location :../index.php?act=listProduct');
               // die();
          }
     }
}

