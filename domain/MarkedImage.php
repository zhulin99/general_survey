<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/20
 * Time: 18:05
 */
class MarkedImage
{


    private $user_id;
    private $img_name;
    private $class_1;
    private $class_2;
    private $time_stamp;
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }


    /**
     * @return mixed
     */
    public function getTimeStamp()
    {
        return $this->time_stamp;
    }

    /**
     * @param mixed $time_stamp
     */
    public function setTimeStamp($time_stamp)
    {
        $this->time_stamp = $time_stamp;
    }


    /**
     * @return mixed
     */
    public function getClass2()
    {
        return $this->class_2;
    }

    /**
     * @param mixed $class_2
     */
    public function setClass2($class_2)
    {
        $this->class_2 = $class_2;
    }


    /**
     * @return mixed
     */
    public function getClass1()
    {
        return $this->class_1;
    }

    /**
     * @param mixed $class_1
     */
    public function setClass1($class_1)
    {
        $this->class_1 = $class_1;
    }


    public function get_img_name()
    {
        return $this->img_name;
    }

    public function set_img_name($img_name)
    {
        $this->img_name = $img_name;
    }
}