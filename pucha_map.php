<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>普查地图</title>

    <link rel="stylesheet" href="js/leaflet/leaflet.css" />
    <link rel="stylesheet" href="css/mtWindow.css">
    <link rel="stylesheet" href="css/pucha_map.css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/leaflet/leaflet.js"></script>
    <script src="js/esri/esri-leaflet.js"></script>
    <script src="js/data/pointsData.js"></script>
    <script src="js/pucha_mapset.js"></script>
    <script src="js/laydate/laydate.js"></script>

    <style type="text/css">
        #mapDiv{width: 100%; height: 950px; background:#D3EAFA}
        .changemap{width: 114px; height: 30px; position:fixed; right:30px; top:30px; z-index:9999; background: #C4C3BE; border: solid 2px #C4C3BE; border-radius:3px;}
        .changemap .buttonbase{width: 56px; height:30px; line-height: 30px; text-align: center; float: left; background: #3388FF; cursor: pointer; background: #FFFFFF; font-size: 14px}
        .changemap .buttonbase:hover{background:#DEDEDE;}
        #mouse_coords{width: 180px; height: 20px; line-height: 20px; text-align: center; position:fixed; left:5px; bottom:10px; z-index:9999; background: #FFFFFF; opacity:0.7; font-size: 13px;}
        .edit_pannel{width: 114px; height: 70px; position:fixed; right:30px; top:80px; z-index:9999;  background: #FFFFFF; border: solid 2px #C4C3BE;}
        .edit_pannel .title{width: 114px; height: 20px; line-height: 20px; text-align: center; font-size: 14px; border-bottom: solid 1px #C4C3BE; background: #dfdfdf;}
        .edit_pannel .tools{width: 114px; height: 49px; line-height: 20px;}
        .edit_pannel .tools .tool{ width: 32px; height: 32px; margin: 8px 0px 0px 15px; float: left; cursor: pointer; }
        .edit_pannel .tools #draw_point{background: url("images/draw_point.png") no-repeat;}
        .edit_pannel .tools #draw_polygon{background: url("images/draw_polygon.png") no-repeat;}
        .del_obj{width: 32px; height: 32px;  position:fixed; right:30px; top:180px; background: #00aa00; z-index: 9999; cursor: pointer;}
    </style>
</head>

<body>
    <div id="mapDiv"></div>

    <div class="changemap">
        <div class="buttonbase" id="TianDiTuVec" href='JavaScript:void(0)' onclick='setBaseMap(this)' style="float: left;">矢量</div>
        <div class="buttonbase" id="TianDiTuSat" href='JavaScript:void(0)' onclick='setBaseMap(this)' style="float: right;">影像</div>
    </div>

    <div class="edit_pannel">
        <div class="title">在线编辑</div>
        <div class="tools">
            <div class="tool" title="企业录入" id="draw_point" onclick="draw_point()"></div>
            <div class="tool" title="画面筛选" id="draw_polygon"></div>
        </div>
    </div>

    <div class="del_obj" onclick="remove_obj()">删除</div>

    <div id="mouse_coords"></div>


    <div class="window" id="modalwindow">
        <div class="theme-poptit" id="window_head">
            <a href="javascript:;" class="close">×</a>
            <div style=" font-size:16px; margin-left:45%">企业基本信息</div>
        </div>

        <div class="content">
            <form>
                <div class="item">
                    <div class="left"><label>单位名称：</label></div>
                    <div class="right"><input type="text" name="name" /></div>
                </div>
                <div class="item">
                    <div class="left"><label>单位代码：</label></div>
                    <div class="right"><input type="text" name="name_id" /></div>
                </div>
                <div class="item">
                    <div class="left"><label>法人代表：</label></div>
                    <div class="right"><input type="text" name="daibiao" /></div>
                </div>
                <div class="item">
                    <div class="left"><label>所在地：</label></div>
                    <div class="right"><input type="text" name="adress" /></div>
                </div>
                <div class="item">
                    <div class="left"><label>经纬度：</label></div>
                    <div class="right">
                        <input type="text" name="jing" id="lng" placeholder="经度" style="width: 92px;" />
                        <input type="text" name="wei" id="lat" placeholder="纬度" style="width:92px;" />
                    </div>
                </div>
                <div class="item">
                    <div class="left"><label>联系方式：</label></div>
                    <div class="right"><input type="text" name="tel" /></div>
                </div>

                <div class="item">
                    <div class="left"><label>开业时间：</label></div>
                    <div class="right"><input type="text" name="time" style="width: 180px;" class="laydate-icon" onClick="laydate()" readonly="true" /></div>
                </div>

                <div class="item" style="height: auto;">
                    <div class="left"><label>所属行业：</label></div>
                    <div class="right">
                        <select name="businessRange" style="width:210px; height: 25px; padding-left: 10px; border-radius: 5px; border: solid 1px #999;">
                            <option value ="1">工业源</option>
                            <option value ="2">农业源</option>
                            <option value="3">生活源</option>
                            <option value="4">移动源</option>
                            <option value="5">集中式污染治理设施</option>
                        </select>
                    </div>
                </div>
            </form>


            <div class="item" style="margin-top: 30px;">
                <button type="button" onclick="" style="margin-left: 200px;">提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交</button>
            </div>
            <div class="item" style="margin-top: 30px;">
                <button type="button" onclick="" style="margin-left: 100px;">取&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;消</button>
            </div>
        </div>

    </div>

</body>

<script type="text/javascript">
    initMap();
</script>
</html>