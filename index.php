<?php
require_once ("config/CheckLogin.php")
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>普查检测系统</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>


<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt=""/>普查系统</h1>
    </div>
    <div class="head-l">
        <a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span>前台首页</a> &nbsp;&nbsp;
        <a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span>清除缓存</a> &nbsp;&nbsp;
        <a class="button button-little bg-red" href="login.html"><span class="icon-power-off"></span> 退出登录</a>
    </div>
    <div class="head-1" style="float: right; margin-top: 15px">
        <a class="button button-little bg-green" style="text-align: center">欢迎：<?php   echo $_SESSION["user_name"] ?> 登陆成功</a>
    </div>
</div>

<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>

<!--    <h2><span class="icon-pencil-square-o"></span>普查表单</h2>-->
<!--    <ul>-->
<!--        <li>-->
<!--            <a id="subnav" target="right"><span class="icon-caret-right"></span>泉山区</a>-->
<!--            <ul id="subblock" style="margin-left: 12px; border-top: none">-->
<!--                <li><a href="puchaform_industry.php" target="right"><span class="icon-caret-right"></span>工业源</a>-->
<!--                <li><a href="puchaform_agriculture.php" target="right"><span class="icon-caret-right"></span>农业源</a>-->
<!--                <li><a href="puchaform_life.php" target="right"><span class="icon-caret-right"></span>生活源</a>-->
<!--                <li><a href="puchaform_sheshi.php" target="right"><span class="icon-caret-right"></span>集中式污染治理设施</a>-->
<!--                <li><a href="puchaform_move.php" target="right"><span class="icon-caret-right"></span>移动源</a>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a id="subnav" target="right"><span class="icon-caret-right"></span>云龙区</a>-->
<!--            <ul id="subblock" style="margin-left: 12px; border-top: none">-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>工业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>农业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>生活源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>集中式污染治理设施</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>移动源</a>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a id="subnav" target="right"><span class="icon-caret-right"></span>铜山区</a>-->
<!--            <ul id="subblock" style="margin-left: 12px; border-top: none">-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>工业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>农业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>生活源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>集中式污染治理设施</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>移动源</a>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a id="subnav" target="right"><span class="icon-caret-right"></span>鼓楼区</a>-->
<!--            <ul id="subblock" style="margin-left: 12px; border-top: none">-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>工业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>农业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>生活源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>集中式污染治理设施</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>移动源</a>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a id="subnav" target="right"><span class="icon-caret-right"></span>贾汪区</a>-->
<!--            <ul id="subblock" style="margin-left: 12px; border-top: none">-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>工业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>农业源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>生活源</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>集中式污染治理设施</a>-->
<!--                <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>移动源</a>-->
<!--            </ul>-->
<!--        </li>-->
<!--    </ul>-->

    <h2><a href="pucha_map.php" target="right"><span class="icon-globe"></span>污染源普查</a></h2>

    <h2><span class="icon-pencil-square-o"></span>检测功能</h2>
    <ul>
        <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>泉山区</a></li>
        <li><a href="marked_image.php" target="right"><span class="icon-caret-right"></span>云龙区</a></li>
        <li><a href="start_mark_image.php" target="right"><span class="icon-caret-right"></span>铜山区</a></li>
    </ul>

    <h2><span class="icon-pencil-square-o"></span>核算功能</h2>
    <ul>
        <li><a href="classify_example.php" target="right"><span class="icon-caret-right"></span>自己想</a></li>
        <li><a href="marked_image.php" target="right"><span class="icon-caret-right"></span>自己想</a></li>
        <li><a href="start_mark_image.php" target="right"><span class="icon-caret-right"></span>自己想</a></li>
    </ul>

    <h2><span class="icon-user"></span>基本设置</h2>
    <ul style="display:block">
        <li><a href="pass.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    </ul>

</div>
<script type="text/javascript">
    $(function () {
        $(".leftnav h2").click(function () {
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function () {
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");

            //控制二级菜单功能
            if ($(this).next().attr('id') == 'subblock'){
                var class_value = $(this).find('span').attr("class")
                if (class_value == 'icon-caret-right'){
                    $(this).find('span').attr('class', 'icon-caret-down')
                }else {
                    $(this).find('span').attr('class', 'icon-caret-right')
                }
                $(this).next().slideToggle(200);
                $(this).addClass("on");
            }
        })
    });
</script>



<ul class="bread">
    <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">分类参考样例</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</php></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a></li>
</ul>


<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="pucha_map.php" name="right" width="100%" height="100%">

    </iframe>
</div>

<div style="text-align:center;">
</div>

</body>
</html>