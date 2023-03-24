<?php
session_start();
require_once('../../utlis/utility.php');
require_once '../../connect/dbhelper.php';

$token = getCookie('token');
setcookie('token', '' , time() - 100, '/');


session_destroy();