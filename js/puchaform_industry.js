/**
 * Created by zhu_lin on 2018/6/25.
 */

/**
 * 加载完页面自动执行
 */
$(document).ready(function(){
    var thisURL = decodeURI(document.URL);
    var basicInfo = thisURL.split('?')[1];
    var basicInfoVal= basicInfo.split("=")[1];
    var basicInfoArr = basicInfoVal.split(",");

    $('#baseinfo input[name="unit_name"]').val(basicInfoArr[0]);
    $('#baseinfo input[name="unit_code"]').val(basicInfoArr[1]);
    $('#baseinfo input[name="unit_peop"]').val(basicInfoArr[2]);
    $('#baseinfo input[name="adress"]').val(basicInfoArr[5]);
    $('#baseinfo input[name="coordX"]').val(basicInfoArr[7]);
    $('#baseinfo input[name="coordY"]').val(basicInfoArr[8]);
    $('#baseinfo input[name="tel"]').val(basicInfoArr[3]);
    $('#baseinfo input[name="startTime"]').val(basicInfoArr[6]);
    $('#baseinfo select[name="businessRange"]').val(basicInfoArr[4]);
});


/**
 * 提交表单数据
 */
function submitForm(){

    //判断基本信息表单内容是否为空
    var input_is_null_flag = 0;
    $("#baseinfo input[type='text']").each(function () {
        if ($(this).val() == "") {
            input_is_null_flag = 1;
        }
    })

    if ($("#industry_form #baseinfo .item textarea").val() == "" && input_is_null_flag == 0){
        input_is_null_flag = 1;
    }

    if (input_is_null_flag == 1){
        alert("基本信息内容不能有空值！");
        return;
    }

    //序列化方式获取表单中所有值
    var formdata = $('#industry_form').serializeArray()
    $.param(formdata)

    //异步上传表单中的值
    $.ajax({
        url: "Web/InsertIndustryForm.php",
        type: "POST",
        data: {'data': formdata},
        success: function(data){
            if (data != 0){
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
 * 设置基本信息内容不能为空的提示
 */
// $(function(){
//
//     $("#industry_form #baseinfo .item input").blur(function(){
//         if ($(this).val() == ""){
//             $(this).parent('.right').next().html('* 必填项');
//         }else {
//             $(this).parent().next().html('');
//         }
//     });
//
//     $("#industry_form #baseinfo .item textarea").blur(function(){
//         if ($(this).val() == ""){
//             $(this).parent('.right').next().html('* 必填项');
//         }else {
//             $(this).parent().next().html('');
//         }
//     });
//
// })
