<?php 

//$sql = "  insert into Role (name) values ('admin') ";
//$sql = "  insert into Role (name) values ('$name') ";
// => $name = 'Admin -> sai ký tự đặc biệt phá vỡ sql -> injection
// sửa : \'admin 
// hỗ trợ fix sql injection => sql = "" vì chỉ xóa ' 

function fixSqlInject($sql) {
    $sql = str_replace('\\','\\\\',$sql);
    $sql = str_replace('\'', '\\\'', $sql);
    return $sql;
}


function getGet($key) {
    $value = '';
    if(isset($_GET[$key])) {
        $value = $_GET[$key];
        $value = fixSqlInject($value);
    }
    return trim($value);
}
function getPost($key) {
    $value = '';
    if(isset($_POST[$key])) {
        $value = $_POST[$key];
        $value = fixSqlInject($value);
    }
    return trim($value);

}
function getCookie($key) {
    $value = '';
    if(isset($_COOKIE[$key])) {
        $value = $_COOKIE[$key];
        $value = fixSqlInject($value);
    }
    return trim($value);

}