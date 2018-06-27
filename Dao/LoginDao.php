<?php
require_once("../utils/SqlHelper.php");
/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2018/6/10
 * Time: 16:25
 */
class LoginDao
{
    private $sql_helper;

    function __construct()
    {
        $this->sql_helper = new SqlHelper();
    }

    /***
     * @param $user_name 用户名
     * @param $passwd 密码
     * @return mixed 验证结果
     */
    public function  checkLogin($user_name,$passwd){

        $sql = "select user_id, user_name,user_passwd from img_users where user_name='$user_name' and user_passwd='$passwd'";
        $check_result=$this->sql_helper->execute_dql($sql);
        return $check_result;
    }


}