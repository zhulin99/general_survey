<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/25
 * Time: 18:06
 */
require_once("../utils/SqlHelper.php");


class InsertIndustryFormDao
{
    private $sql_helper;
    function __construct()
    {
        $this->sql_helper = new SqlHelper();
    }

    /**
     * 插入工业源数据
     * @param $IndustryFormData
     * @return int
     */
    public function InsertIndustryForm($IndustryFormData){

        print_r($IndustryFormData);

        $sql = "INSERT INTO industry_form VALUES(".
            "'".$IndustryFormData->getUnitName() ."'" .",".
            "'".$IndustryFormData->getUnitCode() ."'" .",".
            "'".$IndustryFormData->getUnitPeop() ."'" .",".
            "'".$IndustryFormData->getAdress() ."'" .",".
            "'".$IndustryFormData->getCoordX() ."'" .",".
            "'".$IndustryFormData->getCoordY() ."'" .",".
            "'".$IndustryFormData->getTel() ."'" .",".
            "'".$IndustryFormData->getStartTime()."'" .",".
            "'".$IndustryFormData->getBusinessRange()."'" .",".
            "'".$IndustryFormData->getWGod() ."'" .",".
            "'".$IndustryFormData->getWAndan() ."'" .",".
            "'".$IndustryFormData->getWLin() ."'" .",".
            "'".$IndustryFormData->getWDan() ."'" .",".
            "'".$IndustryFormData->getWShiyou() ."'" .",".
            "'".$IndustryFormData->getWFen() ."'" .",".
            "'".$IndustryFormData->getWJing() ."'" .",".
            "'".$IndustryFormData->getWGong() ."'" .",".
            "'".$IndustryFormData->getWGeCd() ."'" .",".
            "'".$IndustryFormData->getWQian() ."'" .",".
            "'".$IndustryFormData->getWGeCr() ."'" .",".
            "'".$IndustryFormData->getWShen() ."'" .",".
            "'".$IndustryFormData->getASo2() ."'" .",".
            "'".$IndustryFormData->getANox() ."'" .",".
            "'".$IndustryFormData->getAKeliwu() ."'" .",".
            "'".$IndustryFormData->getAVocs() ."'" .",".
            "'".$IndustryFormData->getANh3() ."'" .",".
            "'".$IndustryFormData->getAGong() ."'" .",".
            "'".$IndustryFormData->getAGeCd() ."'" .",".
            "'".$IndustryFormData->getAQian() ."'" .",".
            "'".$IndustryFormData->getAGeCr() ."'" .",".
            "'".$IndustryFormData->getAShen() ."'" .
            ")";

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