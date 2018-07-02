<?php session_start();
/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/25
 * Time: 17:08
 */
//header("Content-type:text/html;charset=utf-8");
header('Content-Type:application/json; charset=utf-8');
require_once("../Service/SelectEnterpriseBasicInfoService.php");


//这里加判断，如果session不存在则跳转到登陆
//if ($_SESSION['user_id'] == null){
//    header('Location:login.html');
//    exit(0);
//}


$block = $_GET['block'];


//获取企业基本信息数据
$SelectEnterpriseBasicInfoService = new SelectEnterpriseBasicInfoService();
$result = $SelectEnterpriseBasicInfoService->SelectEnterpriseBasicInfo($block);


//定义GeoJson格式数据
$type = 'Feature';
$resultTemp = array();
for ($i=0; $i<count($result); $i++){
    $properties = array("name"=>$result[$i][0], "code"=>$result[$i][1], "people"=>$result[$i][2], "adress"=>$result[$i][3], "tel"=>$result[$i][6], "time"=>$result[$i][7], "industry"=>$result[$i][8]);
    $geometry = array("type"=>"Point", "coordinates"=>[(float)$result[$i][4], (float)$result[$i][5]]);
    $jsonObj = compact("type","properties","geometry");
    array_push($resultTemp, $jsonObj);
}
$resultJson = json_encode($resultTemp, JSON_UNESCAPED_UNICODE);

echo $resultJson;






