<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/22
 * Time: 13:29
 */
require_once("../Dao/UnMarkedImageDao.php");

class UnMarkedImageService
{
    private $umi;

    function __construct()
    {
        $this->umi = new UnMarkedImageDao();
    }

    /***
     * @param $marked_image
     * @return int
     */
    public function insertClickHistoryImage($marked_image)
    {
       return $this->umi->insertClickHistoryImage($marked_image);
    }

    public function updateMarkedImage($marked_image)
    {

        return $this->umi->updateMarkedImage($marked_image);
    }

    /***
     * 得到分页数据
     * @param $user_id  用户id
     * @param $page_num 页面数
     * @return array
     */
    public function getPageImage($page_num)
    {

        $images=$this->umi->getPageImage(($page_num - 1) * 3, 29);
        return $images;

    }

    /***
     * @param $user_id  用户标识id
     * @return object  该用户所拥有的照片数量
     */
    public function getImagesCount()
    {
        return $this->umi->getImagesCount();
    }
}