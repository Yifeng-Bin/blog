
var url ='';
var data ='';

/**
 *  Ajax 请求 json post
 *  data = {cid:cid};
 * @Author wzb 2016-10-18
 **/
function AjaxJson(url,data,backFunc){
    var data = data || "{}";
    var backFunc = backFunc || null;
    if(!url || url==='#'){
        return false;
    }

    $.ajax({
        type: 'POST',
        url: url,
        data:data,
        timeout:10000,
        dataType: 'json',
        success: function(data) {
            try{ backFunc(data); }catch(e){}
        },
        error: function(xhr, type) {

        },
        complete : function(){
        }
    })
    //阻止冒泡
    return false;
}

/**
 * 实时动态强制更改用户录入(数字)
 * @Author wzb 2016-10-18
 **/
function number(obj,is_minus){
    var is_minus = is_minus || 0;
    //响应鼠标事件，允许左右方向键移动
    event = window.event || event;
    if (event.keyCode == 37 | event.keyCode == 39) {
        return;
    }
    var t = obj.value.charAt(0);
    obj.value = obj.value.replace(/[^\d.]/g, "");
    obj.value = obj.value.replace(/^\./g, "");
    obj.value = obj.value.replace(/\.{2,}/g, ".");
    obj.value = obj.value.replace(".", "$#$").replace(/\./g, "").replace("$#$", ".");
    obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3');
    if (t == '-' && is_minus*1 == 1) {
        obj.value = '-' + obj.value;
    }
}

/**
 * 显示隐藏
 * @Author wzb 2016-10-18
 **/
function bh_toggle(obj,sho_class){
    var is_on = $(obj).attr("is_on");
    console.log(is_on);
    if(is_on*1 == 1){
        $(sho_class).slideUp();
        $(obj).find('.layui-icon').html('&#xe61a;');
        $(obj).attr("is_on",'0');
    }else{
        $(sho_class).slideDown();
        $(obj).find('.layui-icon').html('&#xe619;');
        $(obj).attr("is_on",'1');
    }


}

