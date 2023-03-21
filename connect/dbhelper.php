<?php

require_once ('config.php');

// chạy nhiều câu lệnh insert update delete select 

// sql : insert,update, delete
function execute ($sql) {
     // mở connect sql
     $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
     mysqli_set_charset($conn, 'utf8');

    //  truy vấn
    mysqli_query($conn, $sql);

    // đóng connect 
    mysqli_close($conn);
}

//  sql : select -> lấy dữ liệu đầu ra ( select danh sách bản ghi, lấy 1 bản ghi)
function executeResult ($sql , $isSingle = false) {
     $data = null;
       // mở connect sql
       $conn = mysqli_connect(HOST, USERNAME, PASSWORD,DATABASE);
       mysqli_set_charset($conn,'utf8');
  
      //  truy vấn
      $resultset = mysqli_query($conn, $sql);
     
        if($isSingle) {
            $data = mysqli_fetch_array($resultset, 1);
      }else {
        $data = [];
        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            $data[] = $row;
        } 
    }  
      // đóng connect 
      mysqli_close($conn);
      return $data;
}