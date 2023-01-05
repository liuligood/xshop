var form;
layui.use(['layer','form', 'laydate'],function() {
    var layer = parent.layer === undefined ? layui.layer : parent.layer,
        $ = layui.jquery,
        form = layui.form;

    //全选
    form.on('checkbox(select_all)', function(data){
        //var dataValue = data.value;
        if (data.elem.checked) {
            $('.select_order').prop('checked', true);
        } else {
            $('.select_order').prop('checked', false);
        }
        form.render('checkbox');
    });

    //批量操作
    $(".js-batch").click(function(){
        var ids = [];
        var url = $(this).data('url');
        var title = $(this).data('title');

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            layer.confirm('确定'+title+'？', {icon: 3, title: '提示信息'}, function (index) {
                $.post(url,{
                    order_id : ids
                },function(data){
                    if (data.status==1){
                        layer.msg(data.msg, {icon: 1});
                        window.location.reload();//刷新父页面
                    }else {
                        layer.msg(data.msg, {icon: 5});
                    }
                    layer.close(index);
                });
            });
        }else{
            layer.msg("请选择需要处理的订单");
        }
    });
    //批量导出
    $(".js-batch-export").click(function(){
        var ids = [];
        var url = $(this).data('url');

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            url = url + "?ids=" + ids
            $(this).data('url',url);
            var obj = $(this);
            var title = obj.text();
            obj.text('导出中');
            //var title = obj.attr('data-title');
            //title = title || '导出';
            url += url.indexOf("?") != -1?"":"?";
            var data = $('form').serialize();
            var type = obj.attr('data-method');
            type = type || 'get';
            var param = '';
            if(type == 'post') {
                param = data;
            } else {
                url = url + '&' + data;
            }
            $.ajax({
                type: type,
                url: url,
                data: param,
                dataType:'json',
                success: function(data) {
                    if(data.status == 1){
                        var export_data = {};
                        export_data.key = data.data.key;
                        export_data.list = data.data.list;
                        export_data.header = data.data.header;
                        export_data.fileName = data.data.fileName;

                        $.exportExcel(export_data);
                    }else{
                        layer.msg(data.msg, {icon: 0, time: 2000, shade: 0.3});
                    }
                    ///obj.css({'background-color':'#f4f4f4', 'border-color':'#ddd', 'color':'#444'}).text('导出');
                    obj.text(title);
                },
                error: function(){
                    //obj.css({'background-color':'##f4f4f4', 'border-color':'#ddd', 'color':'#444'}).text('导出');
                    obj.text(title);
                }
            })
            window.location.reload();//刷新父页面
        }else{
            layer.msg("请选择需要处理的订单");
        }
    });

    //批量操作
    $(".js-refresh-out-stock").click(function(){
        var url = $(this).data('url');
        var title = $(this).data('title');
        layer.confirm('确定'+title+'？', {icon: 3, title: '提示信息'}, function (index) {
            $.post(url,{
            },function(data){
                if (data.status==1){
                    layer.msg(data.msg, {icon: 1});
                    window.location.reload();//刷新父页面
                }else {
                    layer.msg(data.msg, {icon: 5});
                }
                layer.close(index);
            });
        });
    });

    //批量选择
    $(".js-batch-open").click(function(){
        var ids = [];
        var url = $(this).data('url');
        var title = $(this).data('title');
        var width = $(this).data('width');
        var height = $(this).data('height');
        width = width || '500px';
        height = height || '400px';

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            layui.layer.open({
                title: title,
                type: 2,
                content: url +'?order_id='+ ids.join(","),
                area: [width,height]
            });
        }else{
            layer.msg("请选择需要处理的订单");
        }
    });

    //批量打印面单
    $("#js-printed").click(function(){
        var ids = [];
        var url = $(this).data('url');

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            $.post(url,{
                order_id : ids
            },function(data){
                if (data.status==1){
                    var tempwindow = window.open();
                    tempwindow.location = data.data;

                    layer.confirm('确定已打印完成？', {icon: 3, title: '提示信息'}, function (index) {

                        $.post('/order/batch-printed-status',{
                            order_id : ids
                        },function(data){
                            if (data.status==1){
                                //layer.msg(data.msg, {icon: 1});
                                window.location.reload();//刷新父页面
                                layer.close(index);
                            }else {
                                layer.msg(data.msg, {icon: 5});
                            }
                        });

                    });
                }else {
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }else{
            layer.msg("请选择需要处理的订单");
        }
    });

    $('.goods_img').hover(function () {
        $(this).find('.big_img').show();
    }, function () {
        $(this).find('.big_img').hide();
    })


    //批量发货
    $("#js-ship").click(function(){
        var ids = [];
        var url = $(this).data('url');

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            layer.confirm('确定批量发货？', {icon: 3, title: '提示信息'}, function (index) {
                $.post(url,{
                    order_id : ids
                },function(data){
                    if (data.status==1){
                        layer.msg(data.msg, {icon: 1});
                        window.location.reload();//刷新父页面
                    }else {
                        layer.msg(data.msg+',操作失败了哦。。', {icon: 5});
                    }
                    layer.close(index);
                });
            });
        }else{
            layer.msg("请选择需要处理的订单");
        }
    });

    //批量选择物流方式
    $("#js-logistics-channels").click(function(){
        var ids = [];
        var url = $(this).data('url');

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            layui.layer.open({
                title: '批量选择物流方式',
                type: 2,
                content: url +'?order_id='+ ids.join(","),
                area: ['500px','400px']
            });
        }else{
            layer.msg("请选择需要处理的订单");
        }
    });

    //批量移入异常
    $("#js-abnormal").click(function(){
        var ids = [];
        var url = $(this).data('url');

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            layui.layer.open({
                title: '批量移入异常',
                type: 2,
                content: url +'?order_id='+ ids.join(","),
                area: ['550px','600px']
            });
        }else{
            layer.msg("请选择需要处理的商品");
        }
    });

    $("#logistics_sign").click(function(){
        var url = $("#logistics_sign").data('url');
        var title = $("#logistics_sign").data('title');
        var width = $("#logistics_sign").data('width');
        var height = $("#logistics_sign").data('height');
        url = url + $('#logistics_no').val();
        open(url, title, width, height);
    });

    $("#logistics_no").keydown(function (e) {
        var curKey = e.which;
        if (curKey == 13) {
            $("#logistics_sign").click();
            e.stopPropagation();
            e.preventDefault();
            return false;
        }
    });

    //批量打印拣货单
    $("#js-picking-printed").click(function(){
        var ids = [];
        var url = $(this).data('url');

        $('.select_order').each(function () {
            if($(this).is(':checked')){
                ids.push($(this).val());
            }
        });

        if(ids.length > 0) {
            var tempwindow = window.open();
            url = url +'?order_id='+ ids.join(",");
            tempwindow.location = url;
            /*$.post(url,{
                order_id : ids
            },function(data){
                if (data.status==1){
                    var tempwindow = window.open();
                    tempwindow.location = data.data;


                }else {
                    layer.msg(data.msg, {icon: 5});
                }
            });*/
        }else{
            layer.msg("请选择需要处理的订单");
        }
    });


    //直接打印面单
    $(".js-direct-printed").click(function(){
        var submit = $(this).data('submit');
        if(submit == '1') {
            console.log(submit)
            return false;
        }
        $(this).data('submit','1');

        var url = $(this).data('url');
        $.get(url,{

        },function(data){
            if (data.status==1){
                var print_data = data.data;
                var url = print_data.pdf_url;
                LODOP = getLodop(false,false);
                if(typeof LODOP == 'undefined'){
                    layer.msg('未检测到打印驱动', {icon: 5});
                    $(this).data('submit','0');
                    return;
                }
                LODOP.PRINT_INIT("打印面单");
                LODOP.SET_PRINTER_INDEX(print_data.label.name);
                LODOP.ADD_PRINT_PDF(0, 0, "100%", "100%", url);
                LODOP.SET_PRINT_PAGESIZE(1, print_data.label.length, print_data.label.width, "");
                //LODOP.SET_PRINT_STYLEA(0, "PDFScalMode", 0);//参数值含义：0-缩小大页面 、1-实际大小（选它）、2-适合纸张    });
                //LODOP.SET_PRINT_STYLEA(0,"ScalX",0.70);
                //LODOP.SET_PRINT_STYLEA(0,"ScalY",0.70);
                LODOP.PRINT();
            } else {
                layer.msg(data.msg, {icon: 5});
            }
            $(this).data('submit','0');
        });
    });

    /**
     * 打开窗口
     * @param url
     * @param title
     */
    function open(url, title, width, height) {
        width = width || '500px';
        height = height || '600px';
        layui.layer.open({
            title: title,
            type: 2,
            content: url,
            area: [width,height]
        });
    }

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

});

layui.define(['layer'], function (exports) {

    exports('logisticsReload', function () {//函数参数
        var log_no = $('#logistics_no').val();
        $('#logistics_no').val('');
        $('#sel_logistics_no').val(log_no);
        $('#sel_btn').click();//刷新
    });

});