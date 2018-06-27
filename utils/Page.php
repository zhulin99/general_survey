<?php

require_once('../Service/MarkedImageService.php');

/***
 * Class Page 页面类
 */
class Page
{
    private $total_count;          //总记录数
    private $page_size = 10;           //一页显示的记录数
    private $current_page = 0;           //当前页
    private $total_page_count;     //总页数

    private $records = [];

    public function __construct($total_count)
    {
        $this->total_count = $total_count;
        $this->total_page_count = ceil($this->total_count / $this->page_size);

    }


    /***
     *  * @return int 返回总记录数
     * 得到总记录数
     */
    public function get_total_count()
    {
        return $this->total_count;
    }

    public function get_total_page_count()
    {
        return $this->total_page_count;
    }

    public function get_page_size()
    {
        return $this->page_size;
    }

    public function get_next_page()
    {

        if ($this->current_page + 1 > $this->total_count)
            return $this->total_count;


        return $this->current_page + 1;
    }

    public function get_pre_page()
    {
        if ($this->current_page - 1 < 1) {
            return 1;
        }

        return $this->current_page - 1;

    }

    public function set_records($records)
    {
        $this->records = $records;
    }

    public function get_records()
    {
        return $this->records;
    }

    public function set_current_page($page_num)
    {
        if ($page_num < 1 || $page_num > $this->total_count) {
            $this->current_page = 1;
            return;
        }
        $this->current_page = $page_num;
    }

    /***
     * @return int 返回当前页
     */
    public function get_current_page()
    {
        return $this->current_page;
    }

}