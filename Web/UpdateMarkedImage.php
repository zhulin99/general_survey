<?php session_start();
/** session_start();
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/21
 * Time: 19:52
 */
require_once("../Service/MarkedImageService.php");
require_once("../domain/MarkedImage.php");

//这里加判断，如果session不存在则跳转到登陆
$user_id = $_SESSION['user_id'];
$img_name = $_POST["image_name"];
$class_1 = $_POST["class_1"];
$class_2 = $_POST["class_2"];


$marked_image = new MarkedImage();
$marked_image->setUserId($user_id);
$marked_image->setClass2($class_2);
$marked_image->setClass1($class_1);
$marked_image->set_img_name($img_name);

$mis=new MarkedImageService();
echo $mis->updateMarkedImage($marked_image);
