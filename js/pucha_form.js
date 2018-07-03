/**
 * Created by zhu_lin on 2018/6/25.
 */

/**
 * 提交企业基本信息
 */
function submitBasicInfo(){
    //判断基本信息表单内容是否为空
    var input_is_null_flag = 0;
    $("#form_basicInfo input[type='text']").each(function () {
        if ($(this).val() == "") {
            input_is_null_flag = 1;
        }
    })

    if (input_is_null_flag == 1){
        alert("基本信息内容不能有空值！");
        return;
    }

    //序列化方式获取表单中所有值
    var formdata = $('#form_basicInfo').serializeArray();
    $.param(formdata);

    //异步上传表单中的值
    $.ajax({
        url: "Web/InsertEnterpriseBasicInfo.php",
        type: "POST",
        data: {'data': formdata},
        success: function(data){
            if (data != 0){
                alert("提交成功!");

                //获取所有信息
                var basicInfo = [formdata[0].value, formdata[1].value, formdata[2].value, formdata[7].value, formdata[9].value, formdata[4].value, formdata[8].value, formdata[6].value, formdata[5].value];

                //提交成功后给marker绑定popwindow
                var popupContent =
                    "<p class='info_window'>单位名称："+ formdata[0].value +"</p>" +
                    "<p class='info_window'>单位代码："+ formdata[1].value +"</p>" +
                    "<p class='info_window'>法人代表："+ formdata[2].value +"</p>" +
                    "<p class='info_window'>联系方式："+ formdata[7].value +"</p>" +
                    "<p class='info_window'>所属行业："+ formdata[9].value +"</p>" +
                    "<p class='info_window'>所在地址："+ formdata[4].value +"</p>" +
                    "<p class='info_window'><a href='#' class='link_button' onClick='ZoomToPoint(\""+formdata[6].value+"\","+formdata[5].value+")'>缩放至</a><a href='#' onclick='open_win(\""+basicInfo+"\")' class='link_button'>污染信息</a></p>";

                switch (formdata[9].value){
                    case "工业源":
                        marker = L.marker([formdata[6].value, formdata[5].value], {icon: industryIcon}).addTo(map);
                        marker.bindPopup(popupContent);
                        return;
                    case "农业源":
                        marker = L.marker([formdata[6].value, formdata[5].value], {icon: argicultureIcon}).addTo(map);
                        marker.bindPopup(popupContent);
                        return;
                    case "生活源":
                        marker = L.marker([formdata[6].value, formdata[5].value], {icon: lifeIcon}).addTo(map);
                        marker.bindPopup(popupContent);
                        return;
                    case "移动源":
                        marker = L.marker([formdata[6].value, formdata[5].value], {icon: moveIcon}).addTo(map);
                        marker.bindPopup(popupContent);
                        return;
                    case "集中式污染治理设施":
                        marker = L.marker([formdata[6].value, formdata[5].value], {icon: sheshiIcon}).addTo(map);
                        marker.bindPopup(popupContent);
                        return;
                }

            }else {
                alert("提交失败!");
            }
        },
        error: function(data){
            alert("提交失败!");
        }
    });
}


/**
 * 从后台获取企业基本信息，并组织成GeoJson对象格式
 * @returns {{type: string, features: Array}}
 */
function getBasicInfoAsGeoJson(blockSelected){
    var GeoJson = {
        "type": "FeatureCollection",
        "features":[]
    };
    $.ajax({
        url: "Web/SelectEnterpriseBasicInfo.php?block="+blockSelected,
        type: "GET",
        async: false,
        dataType: 'json',
        success: function (result) {
            //var data = JSON.stringify(result);
            GeoJson.features = result;
        }
    });
    return GeoJson;
}



