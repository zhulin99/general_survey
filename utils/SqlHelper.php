<?php

/**
 * @author Dzx
 *
 */
class SqlHelper
{
    var $dbname = "puchasys";
    var $host = "127.0.0.1";
    var $port = "3308";
    var $username = "root";
    var $userpass = "root";
    var $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->userpass, $this->dbname, $this->port);

        if (!$this->conn) {
            printf("Error: %s\n", mysqli_error($this->conn));
            exit();
        }
        if (mysqli_connect_errno($this->conn)) {
            echo "连接 MySQL 失败: " . mysqli_connect_error();
        }
        mysqli_query($this->conn, "set character set 'utf8'");//读库
        mysqli_query($this->conn, "set names utf8");
    }

    /***
     * 返回一条结果
     * @param $sql
     * @return object
     */
    function execute_dql($sql)
    {
        $res = mysqli_query($this->conn, $sql) or die(
        "execute_dql SQL查询语句有误".$sql);

        $rs = mysqli_fetch_row($res);

        return $rs;
    }

    function execute_dql2($sql)
    {
        $res = mysqli_query($this->conn, $sql) or die(
        "execute_dql2 SQL查询语句有误:"+$sql);
        $rs_arr = array();
        while ($rs = mysqli_fetch_row($res)) {
            $rs_arr[] = $rs;
        }
        //可以立马释放资源
        mysqli_free_result($res);
        return $rs_arr; //返回一个数组
    }

    //添加，删除，修改
    function execute_dml($sql)
    {
        $res = mysqli_query($this->conn, $sql) or die("dml语句有误:"+$sql);
        if ($res!=null and $res!="") {
            $rows = mysqli_affected_rows($this->conn);
            if ($rows > 0) {
                return 1;
            } else {
                return 0;
            }
        }
        return 0;
    }


    //分页的查询调用
    //因为分页功能是一个通用的功能.所有也一个函数来处理
    function execute_dql_page($sqls, $fenyepage)
    {
        //执行SQL语句，查出有多少条记录
        $fenyepage->rowcount = mysqli_num_rows(mysqli_query($this->conn, $sqls[0]));
        //echo $fenyepage->rowcount; exit();
        //执行SQL语句，查出要查看的记录
        $fenyepage->res = $this->execute_dql2($sqls[1]);

    }

    //关掉连接
    function my_close()
    {
        if (!empty($this->conn)) {
            mysqli_close($this->conn);
        }
    }


}