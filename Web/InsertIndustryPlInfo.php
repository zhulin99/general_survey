<?php
/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/7/1
 * Time: 11:21
 */
require_once("../domain/pollution_industry.php");
require_once("../Service/InsertPollutionInfoService.php");

//这里加判断，如果session不存在则跳转到登陆
//if ($_SESSION['user_id'] == null){
//    header('Location:login.html');
//    exit(0);
//}


$data = $_POST['data'];
$handle = array();
for($i=0; $i<count($data); $i++) {
    if ($data[$i]['value'] != null){
        $handle[$data[$i]['name']] = $data[$i]['value'];
    }else{
        $handle[$data[$i]['name']] = NULL;
    }
}

//获取表单数据
$IndustryPlData = new pollution_industry();
$IndustryPlData->setUnitName($handle['unit_name']);
$IndustryPlData->setUnitCode($handle['unit_code']);

$IndustryPlData->setWGod($handle['w_god']);
$IndustryPlData->setWAndan($handle['w_andan']);
$IndustryPlData->setWLin($handle['w_lin']);
$IndustryPlData->setWDan($handle['w_dan']);
$IndustryPlData->setWShiyou($handle['w_shiyou']);
$IndustryPlData->setWFen($handle['w_fen']);
$IndustryPlData->setWJing($handle['w_jing']);
$IndustryPlData->setWGong($handle['w_gong']);
$IndustryPlData->setWGeCd($handle['w_geCd']);
$IndustryPlData->setWQian($handle['w_qian']);
$IndustryPlData->setWGeCr($handle['w_geCr']);
$IndustryPlData->setWShen($handle['w_shen']);

$IndustryPlData->setASo2($handle['a_so2']);
$IndustryPlData->setANox($handle['a_nox']);
$IndustryPlData->setAKeliwu($handle['a_keliwu']);
$IndustryPlData->setAVocs($handle['a_vocs']);
$IndustryPlData->setANh3($handle['a_nh3']);
$IndustryPlData->setAGong($handle['a_gong']);
$IndustryPlData->setAGeCd($handle['a_geCd']);
$IndustryPlData->setAQian($handle['a_qian']);
$IndustryPlData->setAGeCr($handle['a_geCr']);
$IndustryPlData->setAShen($handle['a_shen']);

$InsertPollutionInfoService = new InsertPollutionInfoService();
echo $InsertPollutionInfoService->InsertIndustryPlInfo($IndustryPlData);