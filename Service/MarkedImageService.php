<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/21
 * Time: 10:11
 */

require_once("../Dao/MarkedImageDao.php");
require_once("../utils/Page.php");

class MarkedImageService
{
    private $markedImageDao;


    public function __construct()
    {
        $this->markedImageDao = new MarkedImageDao();
    }


    /***
     * MarkedImageDao得到分页查询的数据
     * @param $user_id 用户标识id
     * @param $off_size  偏离量
     * @param $page_size 页面数据大小
     * @return object
     */
    public function getMarkedImages($user_id,$page_num)
    {
        $page = new Page($this->getImagesCount($user_id));
        $page->set_current_page($page_num);


        $records = $this->markedImageDao->getMarkedImages($user_id, ($page->get_current_page() - 1) * $page->get_page_size(), $page->get_page_size());

        $page->set_records($records);

        return $page;
    }

    /***
     * @param $user_id  用户标识id
     * @return 该用户所拥有的照片数量
     */
    public function getImagesCount($user_id)
    {

        return $this->markedImageDao->getImagesCount($user_id);
    }

    /***
     * @param $marked_image
     * @return int 返回影响的行数
     */
    public function updateMarkedImage($marked_image)
    {
        return $this->markedImageDao->updateMarkedImage($marked_image);
    }
}