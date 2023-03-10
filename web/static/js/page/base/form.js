var form;
layui.config({
    base: '/student/web/static/plugins/layui-extend/',
    version: "2021060501"
}).extend({
    common:'common'
}).use(['form','layer','table','upload', 'laydate','laytpl'],function(){
    form = layui.form;
    $ = layui.jquery;
    var layer = parent.layer === undefined ? layui.layer : top.layer;
    var common = layui.common;
    //提交表单
    form.on("submit(form)",function(data){
        sumbit_from(data,$(this),false);
        return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    });

    function sumbit_from(data,obj,save = false){
        var index = layer.msg('提交中，请稍候',{icon: 16,time:false,shade:0.8});
        var form_name = obj.data('form');
        var save = obj.data('save');
        var form = $('#' + form_name);
        var is_reload = form.data('reload') !== false;
        var param = form.serializeArray();
        if(save) {
            param.push({name: 'submit_save', value: save});
        }
        $.ajax({
            method:'post',
            url:form.attr('action'),
            data:param,
            success:function(res){
                if (res.status==1){
                    layer.msg(res.msg, {icon: 1});
                    if(window.pre_form && typeof(window.pre_form) == "function") {
                        window.pre_form();
                    }
                    setTimeout(function () {
                        if(is_reload) {
                            if (window.parent.layui.getTableName()) {
                                window.parent.layui.tableReload();//刷新父列表
                            } else {
                                window.parent.location.reload();//刷新父页面
                            }
                        }
                        var parent_index = parent.layer.getFrameIndex(window.name);//获取窗口索引
                        parent.layer.close(parent_index);
                        //location.reload();
                    }, 2000);
                }else {
                    layer.msg(res.msg, {icon: 5});
                }
            },
            error:function (){
                layer.msg('服务器错误', {icon: 5});
            }
        });
        layer.close(index);
    }

    common.select2();
    common.date();
    common.datetime();

    var layer_this = layui.layer;
    var load_index = '';
    $.ajaxSetup({
        beforeSend: function () {
            load_index = layer_this.load(1,{shade:0.8});
        },
        complete: function () {
            layer_this.close(load_index);
        }
    });

    $('.layui-form').on('click',".js-help",function(data){
        var content = $(this).data('content');
        layer.tips(content,$(this), {
            tips: [3, '#3595CC'],
            time: 8000
        });
    });

});