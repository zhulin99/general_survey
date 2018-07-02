<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/29
 * Time: 18:10
 */
require_once("../utils/SqlHelper.php");

class SelectEnterpriseBasicInfoDao
{
    private $sql_helper;
    function __construct()
    {
        $this->sql_helper = new SqlHelper();
    }

    /**
     * 查询企业基本信息
     * @return int
     */
    public function SelectEnterpriseBasicInfo($block){
        if ($block == "all"){
            $sql = "SELECT * FROM enterprisebasicinfo";
        }else{
            $sql = "SELECT * FROM enterprisebasicinfo where block='$block'";
        }

        $result = $this->sql_helper->execute_dql2($sql);
        return $result;
    }

    /**
     * 关闭数据库连接
     */
    function __destruct()
    {
        $this->sql_helper->my_close();
    }
}