
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
<div class="lay-search" style="padding-left: 10px;padding-top:20px  ">
    商品标题：
    <div class="layui-inline">
        <input class="layui-input search-con" name="ShoppingCartSearch[title]" autocomplete="off">
    </div>

    <button class="layui-btn" data-type="search_lists">搜索</button>
</div>
    <div class="layui-form" style="padding:10px">
    	<a class="layui-btn layui-btn-normal layui-btn-xm allo_btn"  data-url="<?=Url::to(['shopping-cart/sum-cart'])?>" data-title="编辑" data-callback_title="结算">结算</a>
	</div>
    <div class="layui-card-body">
<table id="shopping-cart" class="layui-table" lay-data="{url:'<?=Url::to(['shopping-cart/list'])?>', height : 'full-20', cellMinWidth : 95, page:{limits:[20, 50, 100, 500, 1000]}}" lay-filter="shopping-cart">
    <thead>
    <tr>
        <th lay-data="{type: 'checkbox', width:50}">ID</th>
        <th lay-data="{ align:'center',templet:'#goodsImgTpl'}">商品主图</th>
        <th lay-data="{templet:'#goodsTitle',align:'left'}">标题</th>
        <th lay-data="{field: 'price'}">价格(￥)</th>
        <th lay-data="{templet:'#numberImgTpl'}">数量</th>
        <th lay-data="{minWidth:175, templet:'#listBar',align:'center'}">操作</th>
    </tr>
    </thead>
</table>
</div>
    </div>
</div>
<!--操作-->
<script type="text/html" id="listBar">
    {{# if(d.goods_status == 0){ }}
        <span>该商品已下架</span>
    {{# }else{ }}
    <a class="layui-btn layui-btn-normal layui-btn-xs"  data-height="495px"  data-width="1100px" lay-event="update" data-url="<?=Url::to(['shopping-cart/update'])?>?id={{ d.id }}" data-title="编辑" >编辑数量</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete" data-url="<?=Url::to(['shopping-cart/delete'])?>?id={{ d.id }}">移出购物车</a>
    {{# } }}
</script>
<script type="text/html" id="numberImgTpl">
    {{ d.number }}
</script>
<script type="text/html" id="goodsImgTpl">
    <a href="{{d.goods_img}}" data-lightbox="pic">
        <img class="layui-circle" src="{{d.goods_img}}?imageView2/2/h/100" width="100"/>
    </a>
</script>
<script type="text/html" id="goodsTitle">
    {{# if(d.goods_status == 0){ }}
        <span style="color:red">{{d.title}}</span>
    {{# }else{ }}
        {{d.title}}
    {{# } }}
</script>

<script>
    const tableName="shopping-cart";
</script>
<?=$this->registerJsFile("@web/static/js/page/base/lists.js?".time());?>
<?php
$this->registerCssFile("@web/static/plugins/lightbox2/css/lightbox.min.css", ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile("@web/static/plugins/lightbox2/js/lightbox.min.js", ['depends' => 'yii\web\JqueryAsset']);

?>
