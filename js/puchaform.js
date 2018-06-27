/**
 * Created by zhu_lin on 2018/6/25.
 */


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
$(function(){

    $("#industry_form #baseinfo .item input").blur(function(){
        if ($(this).val() == ""){
            $(this).parent('.right').next().html('* 必填项');
        }else {
            $(this).parent().next().html('');
        }
    });

    $("#industry_form #baseinfo .item textarea").blur(function(){
        if ($(this).val() == ""){
            $(this).parent('.right').next().html('* 必填项');
        }else {
            $(this).parent().next().html('');
        }
    });

})
