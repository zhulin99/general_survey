<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/29
 * Time: 17:15
 */
require_once("../utils/SqlHelper.php");

class InsertEnterpriseBasicInfoDao
{
    private $sql_helper;
    function __construct()
    {
        $this->sql_helper = new SqlHelper();
    }

    /**
     * 插入企业基本信息
     * @param $EnterpriseBasicInfo
     * @return int
     */
    public function InsertEnterpriseBasicInfo($EnterpriseBasicInfo){
        print_r($EnterpriseBasicInfo);

        $sql = "INSERT INTO enterprisebasicinfo VALUES(".
            "'".$EnterpriseBasicInfo->getUnitName() ."'" .",".
            "'".$EnterpriseBasicInfo->getUnitCode() ."'" .",".
            "'".$EnterpriseBasicInfo->getUnitPeop() ."'" .",".
            "'".$EnterpriseBasicInfo->getAdress() ."'" .",".
            "'".$EnterpriseBasicInfo->getCoordX() ."'" .",".
            "'".$EnterpriseBasicInfo->getCoordY() ."'" .",".
            "'".$EnterpriseBasicInfo->getTel() ."'" .",".
            "'".$EnterpriseBasicInfo->getStartTime()."'" .",".
            "'".$EnterpriseBasicInfo->getBusinessRange()."'" .
            ")";

        print_r($sql);
        return $this->sql_helper->execute_dml($sql);
    }


    /**
     * 关闭数据库连接
     */
    function __destruct()
    {
        $this->sql_helper->my_close();
    }

}