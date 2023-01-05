var form;
var formSelects;
layui.config({
    base: '/static/plugins/layui-extend' //此处路径请自行处理, 可以使用绝对路径
}).extend({
    formSelects: '/layuiformSelects/src/formSelects-v4',
    xmSelect:'/xmSelect/xm-select'
});
layui.use(['form','layer','upload','formSelects','xmSelect'],function(){
    form = layui.form;
    formSelects = layui.formSelects;
    formSelects.btns('selectItems', ['select', 'remove', 'reverse']);

    $ = layui.jquery;
    var layer = parent.layer === undefined ? layui.layer : top.layer;
    var upload =layui.upload;

    xmSelect = layui.xmSelect;
    shop = $.parseJSON(shopArr);
    var shop_id = xmSelect.render({
        el: '#shop_id',
        toolbar:{
            show: true,
        },
        filterable: true,
        height: '500px',
        data: shop
    })

    //添加管理

    form.on("submit(createAdminUser)",function(data){
        var items=formSelects.value('selectItems', 'val');
        var index = layer.msg('提交中，请稍候',{icon: 16,time:false,shade:0.8});
        setTimeout(function(){

                $.post(adminUserCreateUrl,{
                    username:data.field.username,
                    nickname:data.field.nickname,
                    head_img:data.field.head_img,
                    email:data.field.email,
                    items:items,
                    password:data.field.password,
                    shop_id:shop_id.getValue('value')
                },function(res){
                    if (res.status==1){
                        layer.msg(res.msg, {icon: 1});
                    }else {
                        layer.msg(res.msg, {icon: 5});
                    }
                })
            layer.close(index);

        },2000);
        return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    })
    //普通图片上传
    var uploadInst = upload.render({
        elem: '#uploadHead'
        ,url: '/admin-user/upload-head-img'
        ,before: function(obj){
            //预读本地文件示例，不支持ie8
            obj.preview(function(index, file, result){
                $('#headSrcView').attr('src', result); //图片链接（base64）
            });
        }
        ,done: function(res){
            //如果上传失败
            if(res.status== 0){
                return layer.msg('上传失败');
            }else{
                $('#headSrc').val(res.data.head_img); //图片链接（base64）
            }

        }
        ,error: function(){
            //演示失败状态，并实现重传
            var uploadHeadText = $('#uploadHeadText');
            uploadHeadText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs uploadHeadText-reload">重试</a>');
            uploadHeadText.find('.uploadHeadText-reload').on('click', function(){
                uploadInst.upload();
            });
        }
    });
})