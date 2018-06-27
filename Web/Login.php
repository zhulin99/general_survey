<?php  session_start();
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/23
 * Time: 10:34
 */
require_once('../Service/LoginService.php');


/***
 * 验证登录
 * @param $username 用户名
 * @param $password 密码
 * @return mixed
 */
function  checkLogin($username,$password){

    $loginService=new LoginService();
    $check_result= $loginService->checkLogin($username,$password);
    return $check_result;
}

/***
 * @param $str post 参数
 * @return null
 */
function _post($str){
    $val = !empty($_POST[$str]) ? $_POST[$str] : null;
    return $val;
}


$username = _post("username");
$password = _post("password");

//echo _post($_POST['username']),$_POST['v'];
$result=checkLogin($username,$password);


if (($result[2]!=''||$result[2]!=Null  )&&$result[2]==$password){
    $_SESSION['user_id']=$result[0];
    $_SESSION['user_name']=$result[1];
    echo 1;
}else{
    echo 0;
}


//echo checkLogin('zhupc','123')[0];





