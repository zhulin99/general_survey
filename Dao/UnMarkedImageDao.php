<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/22
 * Time: 11:42
 */
require_once("../utils/SqlHelper.php");

class UnMarkedImageDao
{

    private $sql_helper;

    function __construct()
    {
        $this->sql_helper = new SqlHelper();
    }

    /***
     * @param $marked_image
     * @return int
     */
    public function insertClickHistoryImage($marked_image)
    {
        $sql = "INSERT INTO img_click_history(user_id,img_name,class_1,class_2) VALUES(" . $marked_image->getUserId() . ",'" . $marked_image->get_img_name() . "','" . $marked_image->getClass1() . "','" . $marked_image->getClass2() . "')";
        // $sql = "UPDATE img_repos SET class_1='" . $marked_image->getClass1() . "',class_2='" . $marked_image->getClass2() . "'  WHERE img_name='" . $marked_image->get_img_name() . "'";

        return $this->sql_helper->execute_dml($sql);
    }

    /***
     * @param $marked_image
     * @return int
     */
    public function updateMarkedImage($marked_image)
    {

        $sql = "UPDATE img_repos SET class_1='" . $marked_image->getClass1() . "',class_2='" . $marked_image->getClass2() . "'  WHERE img_name='" . $marked_image->get_img_name() . "'";

        return $this->sql_helper->execute_dml($sql);
    }

    /***
     * @param $image_name
     * @return array
     */
    public function getOneMarkedImage($image_name)
    {
        $sql = "SELECT id,json_class FROM img_repos WHERE img_name='" . $image_name . "'";
        $res = $this->sql_helper->execute_dql($sql);
        return [$res[0], $res[1]];
    }

    /***
     * MarkedImageDao得到分页查询的数据
     * @param $user_id 用户标识id
     * @param $off_size  偏离量
     * @param $page_size 页面数据大小
     * @return array
     */
    public function getUnmarkedImage($user_id, $off_size, $page_size)
    {
        $sql = "select img_name FROM (SELECT img_name FROM img_repos " . "  LIMIT " . $off_size . "," . $page_size . " ) A WHERE not EXISTS(SELECT img_click_history.`img_name` FROM img_click_history WHERE img_click_history.`img_name`=A.`img_name`  AND img_click_history.`user_id`=" . $user_id . ")";
        $array_results = $this->sql_helper->execute_dql2($sql);
        $unmarked_images = [];
        for ($i = 0; $i < count($array_results); $i++) {
            $unmarked_images[$i] = $array_results[$i][0];
        }
        return $unmarked_images;
    }

    public function getPageImage($off_size, $page_size)
    {
        $sql = "SELECT img_name FROM img_repos " . "  LIMIT " . $off_size . "," . $page_size;

        $array_results = $this->sql_helper->execute_dql2($sql);
        $page_images = [];
        for ($i = 0; $i < count($array_results); $i++) {
            $page_images[$i] = $array_results[$i][0];
        }
        return $page_images;
    }

    /***
     * @param $user_id  用户标识id
     * @return object 该用户所拥有的照片数量
     */
    public function getImagesCount()
    {
        //$sql = "SELECT count(img_name) FROM img_repos WHERE NOT EXISTS(SELECT img_click_history.`img_name` FROM img_click_history WHERE img_click_history.`img_name`=img_repos.`img_name`  AND img_click_history.`user_id`=" . $user_id . ")";

        $sql = "SELECT count(img_name) FROM img_repos";
        return $this->sql_helper->execute_dql($sql);
    }

    /***
     * 当对象被回收的时候，关闭数据库连接
     */
    function __destruct()
    {
        $this->sql_helper->my_close();
    }
}