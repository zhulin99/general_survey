<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>普查地图</title>

    <link rel="stylesheet" href="js/leaflet/leaflet.css" />
    <link rel="stylesheet" href="css/pucha_map.css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/leaflet/leaflet.js"></script>
    <script src="js/esri/esri-leaflet.js"></script>
    <script src="js/data/pointsData.js"></script>
    <script src="js/pucha_mapset.js"></script>

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
            <div class="tool" title="企业录入" id="draw_point"></div>
            <div class="tool" title="画面筛选" id="draw_polygon"></div>
        </div>
    </div>

    <div id="mouse_coords"></div>

</body>

<script type="text/javascript">
    initMap();
</script>
</html>