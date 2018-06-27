<?php session_start();
/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/21
 * Time: 10:22
 */
require_once('../Service/MarkedImageService.php');
$page_num = $_GET["page_num"];

function get_marked_images($page_num)
{
    $user_id = $_SESSION['user_id'];
    $mis = new MarkedImageService();
    $page = $mis->getMarkedImages($user_id,$page_num);
    $imgs = [];

    $rs = $page->get_records();
    for ($i = 0; $i < count($rs); $i++) {
        $imgs[$i] = array("image_name" => $rs[$i]->get_img_name(), "modify_time" => $rs[$i]->getTimeStamp(), "class_1" => $rs[$i]->getClass1(), "class_2" => $rs[$i]->getClass2());
    }

    /***
     * 对象转json
     */
    $arr = array("current_page" => $page->get_current_page(), "pre_page" => $page->get_pre_page(), "next_page" => $page->get_next_page(),
        "total_page" => $page->get_total_page_count(), "total_count" => $page->get_total_count(), "records" => $imgs);
    echo json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

get_marked_images($page_num);


