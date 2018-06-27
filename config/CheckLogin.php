<?php session_start();

$session=$_SESSION['user_id'];
if($session==null ||$session=="")
    Header("Location:login.html");

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/22
 * Time: 19:32
 */