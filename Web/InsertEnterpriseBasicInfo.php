<?php session_start();
/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/25
 * Time: 17:08
 */
require_once("../domain/EnterpriseBasicInfo.php");
require_once("../Service/InsertEnterpriseBasicInfoService.php");


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
        $handle[$data[$i]['name']] = 'NULL';
    }
}

//获取表单数据
$EnterpriseBasicInfo = new EnterpriseBasicInfo();
$EnterpriseBasicInfo->setUnitName($handle['unit_name']);
$EnterpriseBasicInfo->setUnitCode($handle['unit_code']);
$EnterpriseBasicInfo->setUnitPeop($handle['unit_peop']);
$EnterpriseBasicInfo->setAdress($handle['adress']);
$EnterpriseBasicInfo->setCoordX($handle['coordX']);
$EnterpriseBasicInfo->setCoordY($handle['coordY']);
$EnterpriseBasicInfo->setTel($handle['tel']);
$EnterpriseBasicInfo->setStartTime($handle['startTime']);
$EnterpriseBasicInfo->setBusinessRange($handle['businessRange']);
$EnterpriseBasicInfo->setBlock($handle['block']);

//调用Service层传入数据
$InsertEnterpriseBasicInfoService = new InsertEnterpriseBasicInfoService();
echo $InsertEnterpriseBasicInfoService->InsertEnterpriseBasicInfo($EnterpriseBasicInfo);






