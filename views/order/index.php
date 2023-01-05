<?php
/**
 * @var $this \yii\web\View;
 */
use yii\helpers\Url;
?>
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-body" style="margin-top: 15px;">
            <table class="layui-table" id="order-index" style="text-align: center">
                <div class="layui-row layui-col-space15">
            <?php if (empty($list)): ?>
                <tr>
                    <td colspan="17">无数据</td>
                </tr>
            <?php else: foreach ($list as $v):?>
                    <div class="layui-col-sm6 layui-col-md3" style="width: 300px">
                        <div class="layui-card" style="border: 1px solid #ccc">
                            <div class="layui-card-header" style="height:150px;text-align: center">
                            <a href="<?=$v['order_img'] ?>" data-lightbox="pic">
                                <img src="<?=$v['order_img']?>" width="150" height="125" style="margin-top: 12px;margin-bottom: 12px;"/>
                            </a>
                            </div>
                            <div class="layui-card-body layuiadmin-card-list">
                            <div style="max-width:240;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?=$v['title'] ?></div>
                                价格：
                                <span class="layuiadmin-big-font" style="color: red">
                            		￥<?=$v['price'] ?>	
                                </span>
                                <span>
                                	<div class="layui-progress layui-progress-big">
                                      <div class="layui-progress-bar layui-bg-red" lay-percent="<?=$v['now_percent']?>%">剩余<?=$v['now_percent']?>%</div>
                                    </div>
                                </span>
                                <div style="margin-top:12px;margin-left:15px">
                                	<div class="lay-lists">
                                    	<a class="layui-btn layui-btn-danger layui-btn-xm js-batch" data-title="加入购物车" data-url="<?=Url::to(['shopping-cart/create?id='.$v['id']])?>">加入购物车</a>
                                		<a class="layui-btn layui-btn-warm layui-btn-xm " data-url="<?=Url::to(['shopping-cart/update?id='.$v['id']])?>">立即购买</a>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach;?>
            <?php endif;?>
                </div>
            </table>
        </div>
    </div>
</div>
<script>
    const tableName="order-index";
</script>
<?php
$this->registerJsFile("@web/static/js/page/base/lists.js");
$this->registerCssFile("@web/static/plugins/lightbox2/css/lightbox.min.css", ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile("@web/static/plugins/lightbox2/js/lightbox.min.js", ['depends' => 'yii\web\JqueryAsset']);
?>
