<?php session_start();
/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/25
 * Time: 17:08
 */
require_once("../domain/IndustryForm.php");
require_once("../Service/InsertIndustryFormService.php");


//这里加判断，如果session不存在则跳转到登陆
if ($_SESSION['user_id'] == null){
    header('Location:login.html');
    exit(0);
}


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
$IndustryFormData = new IndustryForm();
$IndustryFormData->setUnitName($handle['unit_name']);
$IndustryFormData->setUnitCode($handle['unit_code']);
$IndustryFormData->setUnitPeop($handle['unit_peop']);
$IndustryFormData->setAdress($handle['adress']);
$IndustryFormData->setCoordX($handle['coordX']);
$IndustryFormData->setCoordY($handle['coordY']);
$IndustryFormData->setTel($handle['tel']);
$IndustryFormData->setStartTime($handle['startTime']);
$IndustryFormData->setBusinessRange($handle['businessRange']);

$IndustryFormData->setWGod($handle['w_god']);
$IndustryFormData->setWAndan($handle['w_andan']);
$IndustryFormData->setWLin($handle['w_lin']);
$IndustryFormData->setWDan($handle['w_dan']);
$IndustryFormData->setWShiyou($handle['w_shiyou']);
$IndustryFormData->setWFen($handle['w_fen']);
$IndustryFormData->setWJing($handle['w_jing']);
$IndustryFormData->setWGong($handle['w_gong']);
$IndustryFormData->setWGeCd($handle['w_geCd']);
$IndustryFormData->setWQian($handle['w_qian']);
$IndustryFormData->setWGeCr($handle['w_geCr']);
$IndustryFormData->setWShen($handle['w_shen']);

$IndustryFormData->setASo2($handle['a_so2']);
$IndustryFormData->setANox($handle['a_nox']);
$IndustryFormData->setAKeliwu($handle['a_keliwu']);
$IndustryFormData->setAVocs($handle['a_vocs']);
$IndustryFormData->setANh3($handle['a_nh3']);
$IndustryFormData->setAGong($handle['a_gong']);
$IndustryFormData->setAGeCd($handle['a_geCd']);
$IndustryFormData->setAQian($handle['a_qian']);
$IndustryFormData->setAGeCr($handle['a_geCr']);
$IndustryFormData->setAShen($handle['a_shen']);


//调用Service层传入数据
$InsertFormDateService = new InsertIndustryFormService();
echo $InsertFormDateService->InsertIndustryForm($IndustryFormData);






