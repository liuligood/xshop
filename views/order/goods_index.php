
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Order;
?>
<style>
    .layui-table-body .layui-table-cell{
        height:auto;
    }
</style>
<div class="layui-fluid" style="margin-top: 20px;">
    <div class="layui-card">
<div class="lay-lists">
<form class="layui-form">
    <blockquote class="layui-elem-quote quoteBox">
        <div class="layui-inline">
            <a class="layui-btn" data-type="open" data-height="790px"  data-width="1400px" data-title="添加" data-url="<?=Url::to(['order/create'])?>" data-callback_title = "货物列表" >添加商品</a>
        </div>
    </blockquote>
</form>

<div class="lay-search" style="padding-left: 10px">
    商品标题：
    <div class="layui-inline">
        <input class="layui-input search-con" name="OrderSearch[title]" autocomplete="off">
    </div>

    分类：
<div class="layui-inline">
    <?= Html::dropDownList('OrderSearch[status]', null,Order::$cartegory_mapping,
    ['lay-ignore'=>'lay-ignore','prompt' => '全部','class'=>'layui-input search-con ys-select2' ,'lay-search'=>'lay-search' ,'style'=>'width:150px']) ?>    
</div>

状态：
<div class="layui-inline">
    <?= Html::dropDownList('OrderSearch[goods_status]', null,Order::$goods_status_mapping,
    ['lay-ignore'=>'lay-ignore','prompt' => '全部','class'=>'layui-input search-con ys-select2' ,'lay-search'=>'lay-search' ,'style'=>'width:150px']) ?>    
</div>

    <button class="layui-btn" data-type="search_lists">搜索</button>
    <div class="layui-form" style="padding: 10px 0">
        <div class="layui-inline">
            <a class="layui-btn layui-btn-sm layui-btn-normal js-batchs" data-title="上架" data-url="<?=Url::to(['order/bath?status=1'])?>" >批量上架</a>
        </div>
        <div class="layui-inline">
            <a class="layui-btn layui-btn-sm layui-btn-danger js-batchs" data-title="下架" data-url="<?=Url::to(['order/bath?status=2'])?>" >批量下架</a>
        </div>
    </div>
    </div>
    <div class="layui-card-body">
<table id="order" class="layui-table" lay-data="{url:'<?=Url::to(['order/list'])?>', height : 'full-20', cellMinWidth : 95, page:{limits:[20, 50, 100, 500, 1000]}}" lay-filter="order">
    <thead>
    <tr>
        <th lay-data="{type: 'checkbox', width:50,field: 'id'}"></th>
        <th lay-data="{ width:150,	align:'center',templet:'#goodsImgTpl'}">商品主图</th>
        <th lay-data="{field: 'title',width:150, align:'left'}">标题</th>
        <th lay-data="{field: 'price'}">价格(￥)</th>
        <th lay-data="{field: 'goods'}">货物</th>
        <th lay-data="{field: 'now_goods'}">剩下货物</th>
        <th lay-data="{field: 'status'}">分类</th>
        <th lay-data="{field: 'update_time',  align:'left',minWidth:250}">更新时间</th>
        <th lay-data="{field: 'add_time',  align:'left',minWidth:250}">创建时间</th>
        <th lay-data="{minWidth:175, templet:'#listBar',align:'center'}">操作</th>
    </tr>
    </thead>
</table>
</div>
</div>
    </div>
</div>
<!--操作-->
<script type="text/html" id="listBar">
    {{# if(d.goods_status == '未上架'){ }}
    <a class="layui-btn layui-btn-xs" lay-event="operating" data-title="上架" data-url="<?=Url::to(['order/update-status'])?>?id={{ d.id }}&status=1">上架</a>
    {{# }else{ }}
    <a class="layui-btn layui-btn-danger layui-btn-xs" data-title="下架" lay-event="operating" data-url="<?=Url::to(['order/update-status'])?>?id={{ d.id }}&status=2">下架</a>
    {{# } }}
    <a class="layui-btn layui-btn-normal layui-btn-xs" data-type="open" data-height="495px"  data-width="1100px" lay-event="update" data-url="<?=Url::to(['order/update'])?>?id={{ d.id }}" data-title="编辑" data-callback_title="编辑货物">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete" data-url="<?=Url::to(['order/delete'])?>?id={{ d.id }}">删除</a>
</script>
<script type="text/html" id="goodsImgTpl">
    <a href="{{d.goods_img}}" data-lightbox="pic">
        <img class="layui-circle" src="{{d.goods_img}}?imageView2/2/h/100" width="100"/>
    </a>
</script>

<script>
    const tableName="order";
</script>
<?php
$this->registerJsFile("@web/static/js/page/base/lists.js");
$this->registerCssFile("@web/static/plugins/lightbox2/css/lightbox.min.css", ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile("@web/static/plugins/lightbox2/js/lightbox.min.js", ['depends' => 'yii\web\JqueryAsset']);
?>
