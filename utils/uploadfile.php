<?php
/**
 * Created by PhpStorm.
 * User: zhulin
 * Date: 2018/6/27
 * Time: 22:42
 */
require_once("../utils/RandomString.php");                           //引入外部类
ini_set('date.timezone','Asia/Shanghai');         //为Date()方法设置时区，否则会抛警告


if (!empty($_FILES)) {
    //获得系统根路径
    $fpath = dirname(dirname(dirname(dirname(__FILE__))));
    //上传图片保存路径+日期(图片按日期管理保存)
    $path = dirname(dirname(dirname(__FILE__)))."\general_survey\upload\\".date('Ymd');
    //上传图片保存位置(相对路径)
    $wpath = "\general_survey\upload\\".date('Ymd');

    //检查是否有该文件夹，如果没有就创建，并给予最高权限
    if(!file_exists($path)){
        mkdir("$path", 0700);
    }

    //设置允许上传的文件格式
    $tp = array("image/gif","image/pjpeg","image/png","image/x-png","image/jpeg");
    $fileTypeName='';
    if(!in_array($_FILES["files"]["type"][0], $tp))
    {
        echo 0;
        exit;
    }else{
        switch($_FILES["files"]["type"][0]){
            case "image/gif":
                $fileTypeName="gif";
                break;
            case "image/pjpeg":
                $fileTypeName="jpg";
                break;
            case "image/png":
                $fileTypeName="png";
                break;
            case "image/x-png":
                $fileTypeName="png";
                break;
            default:
                $fileTypeName="png";
                break;
        }
    }

    //判断文件大小
    if($_FILES["files"]['size'][0] > 4000000){
        echo 1;
        exit;
    }

    if($_FILES["files"]["name"][0]){
        $fileName = $_FILES["files"]["name"][0];                                            //原始图片名
        $fileNameTemp = RandomString::generateRandomString().date("YmdHis");        //随机生成新图片名
        $fileAbsolutePath = $path."\\".$fileNameTemp.".".$fileTypeName;                     //上传图片绝对路径
        $fileRelativePath = $wpath."\\".$fileNameTemp.".".$fileTypeName;                    //上传图片相对路径
        $fileRelativePath = str_replace("\\","/",$fileRelativePath);
    }
    //特别注意这里传递给move_uploaded_file的第一个参数为上传到服务器上的临时文件
    $result = move_uploaded_file($_FILES["files"]["tmp_name"][0], $fileAbsolutePath);
    if($result){
        echo 2;
    }
    //return $fileRelativePath;
}