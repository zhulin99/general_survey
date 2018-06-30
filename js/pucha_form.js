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
    var formdata = $('#form_basicInfo').serializeArray()
    $.param(formdata)

    //异步上传表单中的值
    $.ajax({
        url: "Web/InsertEnterpriseBasicInfo.php",
        type: "POST",
        data: {'data': formdata},
        success: function(data){
            if (data != 0){

                var popupContent =
                    "<p class='info_window'>单位名称："+ formdata[0].value +"</p>" +
                    "<p class='info_window'>单位代码："+ formdata[1].value +"</p>" +
                    "<p class='info_window'>法人代表："+ formdata[2].value +"</p>" +
                    "<p class='info_window'>联系方式："+ formdata[6].value +"</p>" +
                    "<p class='info_window'>所属行业："+ formdata[8].value +"</p>" +
                    "<p class='info_window'>所在地址："+ formdata[3].value +"</p>" +
                    "<p class='info_window'><a href='#' class='link_button' onClick='ZoomToPoint(\""+formdata[5].value+"\","+formdata[4].value+")'>缩放至</a><a href='#' onclick='open_win(\""+formdata[8].value+"\")' class='link_button'>污染信息</a></p>";
                marker.bindPopup(popupContent);

                alert("提交成功!");
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
function getBasicInfoAsGeoJson(){
    var GeoJson = {
        "type": "FeatureCollection",
        "features":[]
    };
    $.ajax({
        url: "Web/SelectEnterpriseBasicInfo.php",
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



