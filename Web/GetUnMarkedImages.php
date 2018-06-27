<?php
/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/22
 * Time: 13:42
 */
require_once("../Service/UnMarkedImageService.php");
$page_num = $_GET["page_num"];
$total_page = $_GET["total_page"];
$count = 0;
$uis = new UnMarkedImageService();
if ($total_page == 1)
    $count = $uis->getImagesCount();

$imags = $uis->getPageImage($page_num);

/***
 * 对象转json
 */
$arr = array("total_page" => ceil($count / 29), "records" => $imags);
echo json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
