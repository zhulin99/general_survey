/**
 * Created by zhu_lin on 2018/6/30.
 * 普查地图相关JS
 */

var map;
var customBaselayer;   //底图图层
var layerLabels;       //底图标注


//自定义图标
var industryIcon = L.icon({
    iconUrl: 'images/point_industry.png',
    iconSize: [32, 32],
    iconAnchor: [16, 37],
    popupAnchor: [0, -28]
});


/**
 * 初始化地图
 */
function initMap(){
	//初始化并加载底图
	map = L.map("mapDiv", {drawControl: true}).setView([34.277227,117.200364], 12);
	// 加载天地图矢量底图
	customBaselayer = L.esri.basemapLayer('TianDiTuVec')
	map.addLayer(customBaselayer);  
    layerLabels = L.esri.basemapLayer("TianDiTuVec_A");
    map.addLayer(layerLabels);  
       
    //初始化使计算Map控件大小
	document.getElementById("mapDiv").style.height = document.documentElement.clientHeight-20+"px";
	//当网页变化是重新计算地图控件的大小
	window.onresize=function(){
		document.getElementById("mapDiv").style.height = document.documentElement.clientHeight-20+"px";
	}

    map.on('mousemove', function (e) {
    	var lat = e.latlng.lat.toFixed(4);
        var lng = e.latlng.lng.toFixed(4);
        $("#mouse_coords").html('经:' + lng + '，' + '纬:' + lat);
    })


	//定义popwindow
	function onEachFeature(feature, layer) {
		//获取当前点坐标
		var px = feature.geometry.coordinates[1]
		var py = feature.geometry.coordinates[0]

		var basicInfo = [feature.properties.name, feature.properties.code, feature.properties.people, feature.properties.tel, feature.properties.industry, feature.properties.adress, feature.properties.time, px, py];

		//定义popwindow内信息
		var popupContent = 
		"<p class='info_window'>单位名称："+ feature.properties.name +"</p>" +
		"<p class='info_window'>单位代码："+ feature.properties.code +"</p>" +
		"<p class='info_window'>法人代表："+ feature.properties.people +"</p>" +
		"<p class='info_window'>联系方式："+ feature.properties.tel +"</p>" +
		"<p class='info_window'>所属行业："+ feature.properties.industry +"</p>" +
		"<p class='info_window'>所在地址："+ feature.properties.adress +"</p>" +
		"<p class='info_window'><a href='#' class='link_button' onClick='ZoomToPoint(\""+px+"\","+py+")'>缩放至</a><a href='#' onclick='open_win(\""+basicInfo+"\")' class='link_button'>污染信息</a></p>";

		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		layer.bindPopup(popupContent);
	}
    
    //加载geoJSON点数据
	var pointsData = getBasicInfoAsGeoJson();
    L.geoJSON(pointsData, {
    style: function (feature) {
        return {color: feature.properties.color};
    },
    pointToLayer: function (feature, latlng) {
		return L.marker(latlng, {icon: industryIcon});
	},
	onEachFeature: onEachFeature
	}).addTo(map);
		
}


/**
 *打开污染物信息录入窗体
 * @param basicInfo
 */
function open_win(basicInfo){
	var basicInfoArr = basicInfo.split(",");
	var type = basicInfoArr[4];
	var transbasicInfo = encodeURI(basicInfo);

	switch (type){
		case "工业源":
            window.open("puchaform_industry.php?val=\""+transbasicInfo+"\"", "_blank", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=yes, width=1100, height=600, left=400, top=200");
            break;
        case "农业源":
            window.open("puchaform_agriculture.php?val=\""+transbasicInfo+"\"", "_blank", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=yes, width=1100, height=600, left=400, top=200");
            break;
        case "生活源":
            window.open("puchaform_life.php?val=\""+transbasicInfo+"\"", "_blank", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=yes, width=1100, height=600, left=400, top=200");
            break;
        case "移动源":
            window.open("puchaform_move.php?val=\""+transbasicInfo+"\"", "_blank", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=yes, width=1100, height=600, left=400, top=200");
            break;
        case "集中式污染治理设施":
            window.open("puchaform_sheshi.php?val=\""+transbasicInfo+"\"", "_blank", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=yes, width=1100, height=600, left=400, top=200");
            break;
	}

}


/**
 * 缩放至图层
 * @param x
 * @param y
 * @constructor
 */
function ZoomToPoint(x, y){
	map.flyTo([x,y], 16)
}


/**
 * 切换底图
 * @param idName
 */
function setBaseMap(idName){
	var mapid= idName.id;
	
	if(customBaselayer){
		map.removeLayer(customBaselayer);
	}
	if(layerLabels){
		map.removeLayer(layerLabels);
	} 
	
	if(mapid=="TianDiTuVec"){          
        customBaselayer= L.esri.basemapLayer("TianDiTuVec");
        map.addLayer(customBaselayer);  
        layerLabels = L.esri.basemapLayer("TianDiTuVec_A");
        map.addLayer(layerLabels);  
    }else if(mapid=="TianDiTuSat"){          
        customBaselayer= L.esri.basemapLayer("TianDiTuSat");
        map.addLayer(customBaselayer);  
        layerLabels = L.esri.basemapLayer("TianDiTuSat_A");
        map.addLayer(layerLabels);  
    }
}


/**
 * 添加新的点
 */
var marker;
function draw_point() {
    $(".leaflet-grab").css('cursor','crosshair');

    var lat, lng;
    map.once('mousedown', function (e) {
        lat = e.latlng.lat.toFixed(4);
        lng = e.latlng.lng.toFixed(4);

        marker = L.marker([lat, lng],{icon: industryIcon}).addTo(map);
    })

	map.once('mouseup', function (e) {
        $(".leaflet-grab").css('cursor','-webkit-grab');
        $('#modalwindow').slideDown(200);
        $('#modalwindow #lng').val(lng);
        $('#modalwindow #lat').val(lat);

        $('#modalwindow .close').click(function() {
            $('#modalwindow').slideUp(200);
        })
    })
}


/**
 * 移除刚刚添加的点
 */
function remove_obj() {
    marker.once('click', function(e) {
        marker.remove();
    })
}


/**
 * 点击取消关闭窗口
 */
function closeWindow() {
    $('#modalwindow').slideUp(200);
}




