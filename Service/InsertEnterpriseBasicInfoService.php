<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/29
 * Time: 17:09
 */
require_once("../Dao/InsertEnterpriseBasicInfoDao.php");

class InsertEnterpriseBasicInfoService
{
    private $InsertEnterpriseBasicInfoDao;
    public function __construct()
    {
        $this->InsertEnterpriseBasicInfoDao = new InsertEnterpriseBasicInfoDao();
    }

    /**
     * 插入企业基本信息
     * @param $EnterpriseBasicInfo
     * @return int
     */
    public function InsertEnterpriseBasicInfo($EnterpriseBasicInfo){
        return $this->InsertEnterpriseBasicInfoDao->InsertEnterpriseBasicInfo($EnterpriseBasicInfo);
    }
}