/**
 * Created by zhu_lin on 2018/6/30.
 * 普查地图相关JS
 */

var map;
var customBaselayer;   //底图图层
var layerLabels;       //底图标注

var pointsData;                //存储后台获取的GeoJson点数据
var blockLayers;               //区的面数据

//定义5类污染源的GroupLayer数据，分类别加载，以便于实现图层显示控制
var industryGroup = L.layerGroup();
var agricultureGroup = L.layerGroup();
var lifeGroup = L.layerGroup();
var moveGroup = L.layerGroup();
var sheshiGroup = L.layerGroup();


/**
 * 根据所选区来加载数据
 */
var blockSelected = "all";     //选择加载数据的区,初始化值为全部
$(document).ready(function(){
    $(".chooseBlock #blockselect").change(function(){
        //1、得到选中区的值
        blockSelected = $(this).children('option:selected').val();

        //2、首先移除除底图外所有图层
        map.removeLayer(industryGroup);
        map.removeLayer(agricultureGroup);
        map.removeLayer(lifeGroup);
        map.removeLayer(moveGroup);
        map.removeLayer(sheshiGroup);
        map.removeLayer(blockLayers);

        //3、清空LayerGroup
        industryGroup.clearLayers();
        agricultureGroup.clearLayers();
        lifeGroup.clearLayers();
        moveGroup.clearLayers();
        sheshiGroup.clearLayers();

        //4、根据所选区加载对应区的数据
        addMyPointLayers();

        //5、添加区的面数据
        if(blockSelected == 'all'){
            addAllBlockPolygons();
        }else {
            addSelectedBlock();
        }

    });
});


/**
 * 添加选择的区的面数据
 */
function addSelectedBlock() {
    //设置面的样式
    function style(feature) {
        return {
            fillColor: 'darkblue',
            weight: 2,
            opacity: 1,
            color: 'gray',
            dashArray: '3',
            fillOpacity: 0.2
        };
    }

    switch (blockSelected){
        case "泉山区":
            blockLayers = L.geoJson(quanshan, {style: style}).addTo(map);
            map.fitBounds(blockLayers.getBounds());
            return;
        case "铜山区":
            blockLayers = L.geoJson(tongshan, {style: style}).addTo(map);
            map.fitBounds(blockLayers.getBounds());
            return;
        case "云龙区":
            blockLayers = L.geoJson(yunlong, {style: style}).addTo(map);
            map.fitBounds(blockLayers.getBounds());
            return;
    }
}


/**
 * 自定义marker图标
 */
//工业源
var industryIcon = L.icon({
    iconUrl: 'images/point_industry.png',
    iconSize: [32, 32],
    iconAnchor: [16, 37],
    popupAnchor: [0, -28]
});

//农业源
var argicultureIcon = L.icon({
    iconUrl: 'images/point_agriculture.png',
    iconSize: [32, 32],
    iconAnchor: [16, 37],
    popupAnchor: [0, -28]
});

//生活源
var lifeIcon = L.icon({
    iconUrl: 'images/point_life.png',
    iconSize: [32, 32],
    iconAnchor: [16, 37],
    popupAnchor: [0, -28]
});

//移动源
var moveIcon = L.icon({
    iconUrl: 'images/point_move.png',
    iconSize: [32, 32],
    iconAnchor: [16, 37],
    popupAnchor: [0, -28]
});

//集中式污染治理设施
var sheshiIcon = L.icon({
    iconUrl: 'images/point_sheshi.png',
    iconSize: [32, 32],
    iconAnchor: [16, 37],
    popupAnchor: [0, -28]
});


/**
 * 添加图层（GeoJson点数据）
 */
function addMyPointLayers() {
    //定义每个marker的PopupContent
    function getEachMarkerPopupContent(feature) {
        //获取当前点坐标
        var px = feature.geometry.coordinates[1]
        var py = feature.geometry.coordinates[0]
        //获取所有信息
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

        return popupContent;
    }

    //获取每个点的基本信息GeoJson文件数据
    pointsData = getBasicInfoAsGeoJson(blockSelected);

    //加载geoJSON点数据
    L.geoJSON(pointsData, {
        pointToLayer: function (feature, latlng) {
            var sourceType = feature.properties.industry;
            switch (sourceType){
                case "工业源":
                    var industryPopupContent = getEachMarkerPopupContent(feature);
                    var industryMarker = L.marker(latlng, {icon: industryIcon}).bindPopup(industryPopupContent);
                    industryGroup.addLayer(industryMarker);
                    return;
                case "农业源":
                    var agriculturePopupContent = getEachMarkerPopupContent(feature);
                    var agricultureMarker = L.marker(latlng, {icon: argicultureIcon}).bindPopup(agriculturePopupContent);
                    agricultureGroup.addLayer(agricultureMarker);
                    return;
                case "生活源":
                    var lifePopupContent = getEachMarkerPopupContent(feature);
                    var lifeMarker = L.marker(latlng, {icon: lifeIcon}).bindPopup(lifePopupContent);
                    lifeGroup.addLayer(lifeMarker);
                    return;
                case "移动源":
                    var movePopupContent = getEachMarkerPopupContent(feature);
                    var moveMarker = L.marker(latlng, {icon: moveIcon}).bindPopup(movePopupContent);
                    moveGroup.addLayer(moveMarker);
                    return;
                case "集中式污染治理设施":
                    var sheshiPopupContent = getEachMarkerPopupContent(feature);
                    var sheshiMarker = L.marker(latlng, {icon: sheshiIcon}).bindPopup(sheshiPopupContent);
                    sheshiGroup.addLayer(sheshiMarker);
                    return;
            }
        }
    });

    map.addLayer(industryGroup);
    map.addLayer(agricultureGroup);
    map.addLayer(lifeGroup);
    map.addLayer(moveGroup);
    map.addLayer(sheshiGroup);
}


/**
 *添加图层（GeoJson所有区面数据）
 */
function addAllBlockPolygons(){
    //设置颜色带
    function getColor(d) {
        return d > 1000 ? '#800026' :
            d > 500  ? '#BD0026' :
                d > 200  ? '#E31A1C' :
                    d > 100  ? '#FC4E2A' :
                        d > 50   ? '#FD8D3C' :
                            d > 20   ? '#FEB24C' :
                                d > 10   ? '#FED976' :
                                    '#FFEDA0';
    }

    //设置面的样式
    function style(feature) {
        return {
            fillColor: getColor(feature.properties.density),
            weight: 2,
            opacity: 1,
            color: 'gray',
            dashArray: '3',
            fillOpacity: 0.2
        };
    }

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 3,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.2
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }
    }

    function resetHighlight(e) {
        blockLayers.resetStyle(e.target);
    }

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachPolygonFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    blockLayers = L.geoJson(cityblock, {
        style: style,
        onEachFeature: onEachPolygonFeature
    }).addTo(map);

    map.fitBounds(blockLayers.getBounds());
}


/**
 * 初始化地图
 */
function initMap(){
	//初始化并加载底图
	map = L.map("mapDiv", {drawControl: true}).setView([34.227227,117.200364], 12);
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

    //加载自己的GeoJson数据
    addMyPointLayers();

    //加载区的面数据
    addAllBlockPolygons();

    //定义popwindow
    // function onEachFeature(feature, layer) {
    //     //获取当前点坐标
    //     var px = feature.geometry.coordinates[1]
    //     var py = feature.geometry.coordinates[0]
    //
    //     var basicInfo = [feature.properties.name, feature.properties.code, feature.properties.people, feature.properties.tel, feature.properties.industry, feature.properties.adress, feature.properties.time, px, py];
    //
    //     //定义popwindow内信息
    //     var popupContent =
    //         "<p class='info_window'>单位名称："+ feature.properties.name +"</p>" +
    //         "<p class='info_window'>单位代码："+ feature.properties.code +"</p>" +
    //         "<p class='info_window'>法人代表："+ feature.properties.people +"</p>" +
    //         "<p class='info_window'>联系方式："+ feature.properties.tel +"</p>" +
    //         "<p class='info_window'>所属行业："+ feature.properties.industry +"</p>" +
    //         "<p class='info_window'>所在地址："+ feature.properties.adress +"</p>" +
    //         "<p class='info_window'><a href='#' class='link_button' onClick='ZoomToPoint(\""+px+"\","+py+")'>缩放至</a><a href='#' onclick='open_win(\""+basicInfo+"\")' class='link_button'>污染信息</a></p>";
    //
    //     if (feature.properties && feature.properties.popupContent) {
    //         popupContent += feature.properties.popupContent;
    //     }
    //
    //     layer.bindPopup(popupContent);
    // }

    // L.geoJSON(pointsData, {
    //     pointToLayer: function (feature, latlng) {
    //         var sourceType = feature.properties.industry;
    //         switch (sourceType){
    //             case "工业源":
    //                 return L.marker(latlng, {icon: industryIcon});
    //             case "农业源":
    //                 return L.marker(latlng, {icon: argicultureIcon});
    //             case "生活源":
    //                 return L.marker(latlng, {icon: lifeIcon});
    //             case "移动源":
    //                 return L.marker(latlng, {icon: moveIcon});
    //             case "集中式污染治理设施":
    //                 return L.marker(latlng, {icon: sheshiIcon});
    //         }
    //     },
    //     onEachFeature: onEachFeature
    // }).addTo(map);

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
    // map.once('mousedown', function (e) {
    //     lat = e.latlng.lat.toFixed(4);
    //     lng = e.latlng.lng.toFixed(4);
    //
    //     marker = L.marker([lat, lng],{icon: industryIcon}).addTo(map);
    // })

	map.once('mouseup', function (e) {
        $(".leaflet-grab").css('cursor','-webkit-grab');
        $('#modalwindow').slideDown(200);

        lat = e.latlng.lat.toFixed(4);
        lng = e.latlng.lng.toFixed(4);
        $('#modalwindow #lng').val(lng);
        $('#modalwindow #lat').val(lat);

        $('#modalwindow .close').click(function() {
            $('#modalwindow').slideUp(200);
            $('#form_basicInfo')[0].reset();
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
    $('#form_basicInfo')[0].reset();
}


/**
 * 监听CheckBox状态，控制图层显示
 * @param obj
 */
function clickCheckbox(obj) {
    var type = Number(obj.value);
    switch (type){
        case 1:
            if(!obj.checked){
                map.removeLayer(industryGroup);
            }else {
                map.addLayer(industryGroup);
            }
            return;
        case 2:
            if(!obj.checked){
                map.removeLayer(agricultureGroup);
            }else {
                map.addLayer(agricultureGroup);
            }
            return;
        case 3:
            if(!obj.checked){
                map.removeLayer(lifeGroup);
            }else {
                map.addLayer(lifeGroup);
            }
            return;
        case 4:
            if(!obj.checked){
                map.removeLayer(moveGroup);
            }else {
                map.addLayer(moveGroup);
            }
            return;
        case 5:
            if(!obj.checked){
                map.removeLayer(sheshiGroup);
            }else {
                map.addLayer(sheshiGroup);
            }
            return;
    }

}





