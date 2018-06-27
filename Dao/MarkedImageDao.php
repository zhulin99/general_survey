<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/20
 * Time: 18:04
 */
require_once("../domain/MarkedImage.php");
require_once("../utils/SqlHelper.php");

class MarkedImageDao
{

    private $sql_helper;

    function __construct()
    {
        $this->sql_helper = new SqlHelper();
    }


    /***
     * MarkedImageDao得到分页查询的数据
     * @param $user_id 用户标识id
     * @param $off_size  偏离量
     * @param $page_size 页面数据大小
     * @return array
     */
    public function getMarkedImages($user_id, $off_size, $page_size)
    {
        $marked_images = [];

        $sql = "SELECT img_name ,class_1,class_2 ,time_stamp FROM img_click_history WHERE user_id=" . $user_id . "  ORDER BY  time_stamp DESC   LIMIT " . $off_size . "," . $page_size;

        $array_results = $this->sql_helper->execute_dql2($sql);
        for ($i = 0; $i < count($array_results); $i++) {
            $marked_images[$i] = $this->package_marked_iamge($array_results[$i]);
        }
        return $marked_images;

    }

    /***
     * @param $user_id  用户标识id
     * @return 该用户所拥有的照片数量
     */
    public function getImagesCount($user_id)
    {
        $sql = "SELECT COUNT(*) FROM img_click_history GROUP BY user_id  HAVING user_id=" . $user_id;
        return $this->sql_helper->execute_dql($sql)[0];
    }

    /***
     * @param $marked_image
     * @return int 返回影响的行数
     */
    public function updateMarkedImage($marked_image)
    {

        $sql = "UPDATE img_click_history SET class_1='" . $marked_image->getClass1() . "',class_2='" . $marked_image->getClass2() . "'  WHERE img_name='" . $marked_image->get_img_name()
            . "' AND user_id=" . $marked_image->getUserId();

        return $this->sql_helper->execute_dml($sql);
    }

    /***
     * 包装model
     * @param $result
     * @return MarkedImage
     */
    private function package_marked_iamge($result)
    {
        $mid = new MarkedImage();
        $mid->set_img_name($result[0]);
        $mid->setClass1($result[1]);
        $mid->setClass2($result[2]);
        $mid->setTimeStamp($result[3]);
        return $mid;
    }

    /***
     * 当对象被回收的时候，关闭数据库连接
     */
    function __destruct()
    {
        $this->sql_helper->my_close();
    }
}
