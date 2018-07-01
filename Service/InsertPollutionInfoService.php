<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/7/1
 * Time: 11:17
 */
require_once("../Dao/InsertPollutionInfoDao.php");

class InsertPollutionInfoService
{
    private $InsertPollutionInfoDao;
    public function __construct()
    {
        $this->InsertPollutionInfoDao = new InsertPollutionInfoDao();
    }

    /**
     * 插入工业源污染信息
     * @param $IndustryPlData
     * @return int
     */
    public function InsertIndustryPlInfo($IndustryPlData){
        return $this->InsertPollutionInfoDao->InsertIndustryPlInfo($IndustryPlData);
    }
}