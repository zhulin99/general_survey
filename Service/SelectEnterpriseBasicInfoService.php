<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/29
 * Time: 18:16
 */
require_once("../Dao/SelectEnterpriseBasicInfoDao.php");

class SelectEnterpriseBasicInfoService
{
    private $SelectEnterpriseBasicInfoDao;
    public function __construct()
    {
        $this->SelectEnterpriseBasicInfoDao = new SelectEnterpriseBasicInfoDao();
    }

    /**
     * @return int
     */
    public function SelectEnterpriseBasicInfo($block){
        $result = $this->SelectEnterpriseBasicInfoDao->SelectEnterpriseBasicInfo($block);
        return $result;
    }
}