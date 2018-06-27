<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/22
 * Time: 17:17
 */
require_once("Class_2.php");

class Class_1
{
    private $class_name;
    private $class_2s = [];
    private $count = 0;


    function __construct($class_name)
    {
        $this->class_name = $class_name;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->class_name;
    }

    /**
     * @param mixed $class_name
     */
    public function setClassName($class_name)
    {
        $this->class_name = $class_name;
    }


    /**
     * @return array
     */
    public function getClass2s()
    {
        return $this->class_2s;
    }

    /**
     * @param array $class_2s
     */
    public function setClass2s($class_2s)
    {
        $this->class_2s = $class_2s;
    }


}