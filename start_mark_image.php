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
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/template.js"></script>
    <script src="js/layer.js"></script>
    <script src="js/jquery.pagination.js"></script>
    <link rel="stylesheet" href="css/pagination.css">
    <link rel="stylesheet" href="css/images.css">
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>开始标注</strong></div>
    <div class="body-content">
        <div class="content content--center">
            <div id="continer" class="grid grid--type-b">
                <div class="grid__sizer"></div>
                <script id="marked_images" type="text/html">
                    {{each}}
                    <div class="grid__item">
                        <a class="grid__link" href="#"><img name="{{$value}}" class="grid__img"
                                                            src="images/classify_images/{{$index}}.jpg"
                                                            alt="Some image"/></a>
                    </div>
                    {{/each}}
                </script>
            </div>
        </div>

        <div class="M-box1" style="margin-top: 10px"></div>
    </div>

    <script id="class_templete" type="text/html">
        {{each}}
        <option class="classify-style">{{$value}}</option>
        {{/each}}
    </script>
</body>
</html>

<script src="js/anime.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript">

    function get_class1() {
        var class_1 = [];
        class_1[0] = "artificial_surfaces";
        class_1[1] = 'agricultural_areas';
        class_1[2] = 'forests_and_semi-natural_areas';
        class_1[3] = 'wetlands';
        class_1[4] = 'water_bodies';
        return class_1;
    }
    function get_class2(class_1) {
        var class_2 = [];
        class_2[0] = ["urban_fabric", "industrial,commercial_and_transport", "Mine,dump_and_construction_sites", "artificial,non-agricultural_vegetated_areas"];
        class_2[1] = ["arable_land", "permanent_crops", "pastures", "heterogeneous_agricultural_areas"];
        class_2[2] = ["forests", "Shrub_and/or_herbaceous_vegetation_associations", "open_spaces_with_little_or_no_vegetation"];
        class_2[3] = ["inland_wetlands", "coastal_wetlands"];
        class_2[4] = ["inland_wetlands", "marine_waters"];
        switch (class_1) {
            case  "artificial_surfaces":
                return class_2[0];
                break;
            case  'agricultural_areas':
                return class_2[1];
                break;
            case  "forests_and_semi-natural_areas":
                return class_2[2];
                break;
            case  "wetlands":
                return class_2[3];
                break;
            case  "water_bodies":
                return class_2[4];
                break;
        }
    }
    /***
     * 修改类别
     */
    function modify_category(image_name) {
        var url = "http://" + window.location.host + "/markimage/Web/InsertMarkedImage.php";
        $.post(url, {
            'class_1': $("#class_1").val(),
            "class_2": $("#class_2").val(),
            "image_name": image_name
        }, function (status) {
            if (status == 1)
                layer.msg('更新成功');
            else
                layer.msg('更新失败');
        })
    }
    function update_marked_image(obj) {
        var obj = $(obj);
        var image_name = obj.attr("name");
        layer.open({
            type: 0 //Page层类型,
            ,
            title: '真诚感谢您的支持，三口油~'
            ,
            shade: 0.6 //遮罩透明度
            ,
            anim: 1 //0-6的动画形式，-1不开启
            ,

            content: '<div style="padding:50px;">第一大类：<select id="class_1"></select><br />' +
            '第二大类：<select id="class_2"></select><br /> </div>',
            success: function (layero, index) {
                var class1 = get_class1();
                var html = template("class_templete", class1);
                change_class2_for_class1(class1[0]);
                $("#class_1").append(html);
                $("#class_1").change(function () {

                    change_class2_for_class1($("#class_1").val());
                });
            },
            yes: function (index, layero) {
                modify_category(image_name);
                obj.css("opacity", "0.2");
                layer.close(index);
            }
        });

    }
    /***
     * 级联操作
     * @param class1
     */
    function change_class2_for_class1(class1) {
        var class2 = get_class2(class1);
        $("#class_2 .classify-style").remove();
        var html = template("class_templete", class2);
        $("#class_2").append(html);
    }
    /***
     * 初始化页面
     * @param url
     */
    function frist_page_init(url) {
        $.get(url, function (data) {
            data = JSON.parse(data);
            var html = template("marked_images", data.records);
            $("#continer").append(html);
            window.init_page();
            $('.M-box1').pagination({
                callback: function (api) {
                    get_other_pages("http://" + window.location.host + "/markimage/Web/GetUnMarkedImages.php?total_page=0&page_num=" + api.getCurrent());
                },
                pageCount: data.total_page,
                jump: true,
                coping: true,
                homePage: '首页',
                endPage: '末页',
                prevContent: '上页',
                nextContent: '下页'
            });
        })
    }

    /***
     * 翻页操作
     * @param url
     */
    function get_other_pages(url) {

        $.get(url, function (data) {
            data = JSON.parse(data);
            $("#continer .grid__item").remove();
            var html = template("marked_images", data.records);
            $("#continer").append(html);
            window.init_page();

        })

    }

    $(function () {
        var url = "http://" + window.location.host + "/markimage/Web/GetUnMarkedImages.php?page_num=1&total_page=1";
        frist_page_init(url);

        $("#continer").delegate("img", "click", function () {
            update_marked_image(this);
            //防止事件冒泡
            return false;
        })
    })

</script>
