<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/25
 * Time: 17:58
 */
require_once("../Dao/InsertIndustryFormDao.php");


class InsertIndustryFormService
{
    private $InsertIndustryFormDao;
    public function __construct()
    {
        $this->InsertIndustryFormDao = new InsertIndustryFormDao();
    }

    /**
     * 插入工业源表单数据
     * @param $IndustryFormData
     * @return int
     */
    public function InsertIndustryForm($IndustryFormData){
        return $this->InsertIndustryFormDao->InsertIndustryForm($IndustryFormData);
    }
}