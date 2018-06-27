<?php

/**
 * Created by PhpStorm.
 * User: zhupc
 * Date: 2017/11/22
 * Time: 17:23
 */
require_once("../domain/Class_2.php");
require_once("../domain/Class_1.php");

class Class_AutoGenerator
{

    /**
     * @return array
     */
    function getClassArray()
    {
        $myfile = fopen("../config/class_config.json", "r") or die("Unable to open file!");
        $class_json = fread($myfile, filesize("../config/class_config.json"));
        fclose($myfile);
        $class_1s = [];
        $class_array_json = json_decode($class_json);
        for ($i = 0; $i < count($class_array_json); $i++) {
            $class_1 = new Class_1($class_array_json[$i]->class_1);
            $class_2s = $class_array_json[$i]->class_2;
            $class_tmp = [];
            for ($j = 0; $j < count($class_2s); $j++) {
                $class_tmp[$j] = new Class_2($class_2s[$j]);
            }
            $class_1->setClass2s($class_tmp);
            $class_1s[$i] = $class_1;

        }

        return  $class_1s;
    }
}
