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

function getUserToken() {
    if(isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    $token = getCookie('token');
    $sql = "SELECT * FROM tokens where token = '$token'";
    $item = executeResult($sql,true);
    if($item != null) {
        $userId = $item['user_id'];
        $sql = "SELECT * FROM user where id = '$userId'";
        $item = executeResult($sql,true);
        if($item != null) { 
            $_SESSION['user'] = $item;
            return $item;
        }
    }
    return null;
}
