<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2018/6/10
 * Time: 16:32
 */
require_once("../Dao/LoginDao.php");

class LoginService
{

    public function __construct()
    {
        $this->loginDao = new LoginDao();
    }
    /***
     * @param $user_name 用户名
     * @param $passwd 密码
     * @return mixed 验证结果
     */
    public function  checkLogin($user_name,$passwd){

        $check_result=$this->loginDao->checkLogin($user_name,$passwd);
        return $check_result;
    }
}