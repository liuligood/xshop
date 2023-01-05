layui.use(['layer','table'],function(){

    var layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        table = layui.table;
    //权限列表
    var permissionTable=  table.render({
        elem: '#permission',
        url : permissionListUrl,
        cellMinWidth : 95,
        height : "full-20",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'name', title: '名称', width:250},
            {field: 'ruleName', title: '规则名称',  align:'left',minWidth:50},
            {field: 'description', title: '简述',  align:'left',minWidth:150},
            {field: 'data', title: '扩展数据',  align:'left',minWidth:50},
            {field: 'updatedAt', title: '更新时间',  align:'left',minWidth:50},
            {field: 'createdAt', title: '创建时间',  align:'left',minWidth:50},
            {title: '操作', minWidth:175, templet:'#permissionListBar',fixed:"right",align:"center"}
        ]]
    });
    //批量删除
    $(".remove_btn").click(function(){

        var checkStatus = table.checkStatus('assigned'),

            data = checkStatus.data,
            routes = [];
        if(data.length > 0) {
            for (var i in data) {
                routes.push(data[i].name);
            }
            layer.confirm('确定删除此权限？', {icon: 3, title: '提示信息'}, function (index) {
                $.post(routeRemoveUrl,{
                    routes : routes
                },function(data){
                    if (data.status==1){
                        layer.msg(data.msg, {icon: 1});
                        permissionTable.reload();
                    }else {
                        layer.msg('操作失败了哦。。', {icon: 5});
                    }
                    layer.close(index);
                })
            })
        }else{
            layer.msg("请选择需要移除的权限");
        }
    });

    $(".addNewPer_btn").click(function(){

        var index = layui.layer.open({
            title : "添加权限",
            type :2,
            content :permissionCreateUrl,
            success : function(layero, index){
                setTimeout(function(){
                    layui.layer.tips('点击此处返回权限列表', '.layui-layer-setwin .layui-layer-close', {
                        tips: 3
                    });
                },500)
            }
        })
        layui.layer.full(index);
        window.sessionStorage.setItem("index",index);
        $(window).on("resize",function(){
            layui.layer.full(window.sessionStorage.getItem("index"));
        })
    });

    function  updatePermissionInfo(name){
        var index = layui.layer.open({
            title : "编辑权限",
            type :2,
            content :permissionUpdateUrl+"?per_name="+name,
            success : function(layero, index){
                setTimeout(function(){
                    layui.layer.tips('点击此处返回权限列表', '.layui-layer-setwin .layui-layer-close', {
                        tips: 3
                    });
                },500)
            }
        })
        layui.layer.full(index);
        window.sessionStorage.setItem("index",index);
        $(window).on("resize",function(){
            layui.layer.full(window.sessionStorage.getItem("index"));
        })
    }

    function viewPermission(name){
        var index = layui.layer.open({
            title : "查看权限",
            type :2,
            content :permissionViewUrl+"?per_name="+name,
            success : function(layero, index){
                setTimeout(function(){
                    layui.layer.tips('点击此处返回权限列表', '.layui-layer-setwin .layui-layer-close', {
                        tips: 3
                    });
                },500)
            }
        })
        layui.layer.full(index);
        window.sessionStorage.setItem("index",index);
        $(window).on("resize",function(){
            layui.layer.full(window.sessionStorage.getItem("index"));
        })
    }

    //列表操作
    table.on('tool(permission)', function(obj){

        var layEvent = obj.event,
            data = obj.data;
        if(layEvent === 'update'){ //编辑
            updatePermissionInfo(data.name)
        } else if(layEvent === 'delete'){ //删除
            layer.confirm('确定删除此权限？',{icon:3, title:'提示信息'},function(index){
                $.post(permissionDeleteUrl,{
                    per_name:[data.name]
                },function(res){
                    if (res.status==1){
                        layer.msg(res.msg, {icon: 1});
                        permissionTable.reload();
                    }else {
                        layer.msg(res.msg, {icon: 5});
                    }
                })
            });
        }else if (layEvent=='view'){
            viewPermission(data.name)
        }
    });



});

