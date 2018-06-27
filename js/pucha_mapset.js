
var map;
var customBaselayer;   //底图图层
var layerLabels;       //底图标注


//初始化地图
function initMap(){
	//初始化并加载底图
	map = L.map("mapDiv").setView([34.277227,117.200364], 12);
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
	
	//自定义图标
	var industryIcon = L.icon({
		iconUrl: 'images/point_industry.png',
		iconSize: [32, 32],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});	

	
	//定义popwindow
	function onEachFeature(feature, layer) {
		//获取当前点坐标
		var px = feature.geometry.coordinates[1]
		var py = feature.geometry.coordinates[0]
		
		//定义popwindow内信息
		var popupContent = 
		"<p class='info_window'>单位名称："+feature.properties.name+"</p>" +
		"<p class='info_window'>单位代码："+feature.properties.code+"</p>" +
		"<p class='info_window'>法人代表："+feature.properties.people+"</p>" +
		"<p class='info_window'>联系方式："+feature.properties.tel+"</p>" +		
		"<p class='info_window'>所属行业："+feature.properties.industry+"</p>" +
		"<p class='info_window'>所在地址："+feature.properties.adress+"</p>" +
		"<p class='info_window'><a href='#' class='link_button' onClick='ZoomToPoint(\""+px+"\","+py+")'>缩放至</a><a href='#' class='link_button'>信息录入</a></p>";
		
		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		layer.bindPopup(popupContent);
	}
    
    //加载geoJSON点数据
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


//缩放至
function ZoomToPoint(x, y){
	map.flyTo([x,y], 16)
}


//切换底图
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


//通过H5的Geolocation获取当前用户位置
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(this.showPosition, this.showError);
   	}else { 
    	alert("该浏览器不支持获取坐标位置！"); 
   	}
}
function showPosition(position){
	var lat = position.coords.latitude; //纬度
  	var lag = position.coords.longitude; //经度
  	alert(lat, lag)
}
function showError(error){
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("定位失败,用户拒绝请求地理定位");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("定位失败,位置信息是不可用的");
      break;
    case error.TIMEOUT:
      alert("定位失败,请求获取用户位置超时");
      break;
    case error.UNKNOWN_ERROR:
      alert("定位失败,定位系统失效");
      break;
  }
};
