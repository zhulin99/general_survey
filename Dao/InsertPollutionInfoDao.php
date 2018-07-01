<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/7/1
 * Time: 11:09
 */
require_once("../utils/SqlHelper.php");

class InsertPollutionInfoDao
{
    private $sql_helper;
    function __construct()
    {
        $this->sql_helper = new SqlHelper();
    }


    /**
     * 插入工业源污染信息
     * @param $IndustryPlData
     * @return int
     */
    public function InsertIndustryPlInfo($IndustryPlData){

        $sql = "INSERT INTO pollution_industry VALUES(".
            "'".$IndustryPlData->getUnitCode() ."'" .",".
            "'".$IndustryPlData->getUnitName() ."'" .",".
            "'".$IndustryPlData->getWGod() ."'" .",".
            "'".$IndustryPlData->getWAndan() ."'" .",".
            "'".$IndustryPlData->getWLin() ."'" .",".
            "'".$IndustryPlData->getWDan() ."'" .",".
            "'".$IndustryPlData->getWShiyou() ."'" .",".
            "'".$IndustryPlData->getWFen() ."'" .",".
            "'".$IndustryPlData->getWJing() ."'" .",".
            "'".$IndustryPlData->getWGong() ."'" .",".
            "'".$IndustryPlData->getWGeCd() ."'" .",".
            "'".$IndustryPlData->getWQian() ."'" .",".
            "'".$IndustryPlData->getWGeCr() ."'" .",".
            "'".$IndustryPlData->getWShen() ."'" .",".
            "'".$IndustryPlData->getASo2() ."'" .",".
            "'".$IndustryPlData->getANox() ."'" .",".
            "'".$IndustryPlData->getAKeliwu() ."'" .",".
            "'".$IndustryPlData->getAVocs() ."'" .",".
            "'".$IndustryPlData->getANh3() ."'" .",".
            "'".$IndustryPlData->getAGong() ."'" .",".
            "'".$IndustryPlData->getAGeCd() ."'" .",".
            "'".$IndustryPlData->getAQian() ."'" .",".
            "'".$IndustryPlData->getAGeCr() ."'" .",".
            "'".$IndustryPlData->getAShen() ."'" .
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