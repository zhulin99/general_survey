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

    <script src="js/leaflet/leaflet.js"></script>
    <script src="js/esri/esri-leaflet.js"></script>
    <script src="js/data/pointsData.js"></script>
    <script src="js/pucha_mapset.js"></script>

    <style type="text/css">
        #mapDiv{width: 100%; height: 950px; background:#D3EAFA}
        .changemap{width: 114px; height: 30px; position:fixed; right:30px; top:30px; z-index:9999; background: #C4C3BE; border: solid 2px #C4C3BE; border-radius:3px;}
        .changemap .buttonbase{width: 56px; height:30px; line-height: 30px; text-align: center; float: left; background: #3388FF; cursor: pointer; background: #FFFFFF; font-size: 14px}
        .changemap .buttonbase:hover{background:#DEDEDE;}
    </style>
</head>

<body>
    <div id="mapDiv"></div>

    <div class="changemap">
        <div class="buttonbase" id="TianDiTuVec" href='JavaScript:void(0)' onclick='setBaseMap(this)' style="float: left;">矢量</div>
        <div class="buttonbase" id="TianDiTuSat" href='JavaScript:void(0)' onclick='setBaseMap(this)' style="float: right;">影像</div>
    </div>

</body>

<script type="text/javascript">
    initMap();
</script>
</html>