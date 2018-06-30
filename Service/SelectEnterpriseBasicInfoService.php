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
    private $SelectEnterpriseBasicInfoService;
    public function __construct()
    {
        $this->SelectEnterpriseBasicInfoService = new SelectEnterpriseBasicInfoDao();
    }

    /**
     * @return int
     */
    public function SelectEnterpriseBasicInfo(){
        $result = $this->SelectEnterpriseBasicInfoService->SelectEnterpriseBasicInfo();
        return $result;
    }
}