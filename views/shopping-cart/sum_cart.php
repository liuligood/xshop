<?php
use yii\helpers\Url;
?>
<style>
    html {
        background: #fff;
    }
</style>
<form class="layui-form layui-row" id="update" action="<?=Url::to(['shopping-cart/sum-cart'])?>">

    <div class="layui-col-md6 layui-col-xs12" style="padding-top: 15px">
    
	 	<div class="layui-form-item">
            <label class="layui-form-label">商品总价格</label>
            <div class="layui-input-block">
                <label class="layui-form-label" style="text-align: left;color:red"><?=$price?></label>
            </div>
        </div>
    
    	<div class="layui-form-item">
            <label class="layui-form-label">商品件数</label>
            <div class="layui-input-block">
                <label class="layui-form-label" style="text-align: left;color:red"><?=$num?></label>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">当前余额</label>
            <div class="layui-input-block">
                <label class="layui-form-label" style="text-align: left;color:red"><?=$account?></label>
            </div>
        </div>
        
        
        <div class="layui-form-item">
            <label class="layui-form-label">支付完剩余余额</label>
            <div class="layui-input-block">
                <label class="layui-form-label"  style="text-align: left;color:red"><?=$now_account?></label>
                <input type="hidden" name="account" value="<?=$now_account?>">
            </div>
        </div>
        
       
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="id" value="<?=$user_id?>">
                <input type="hidden" name="cart_id" value="<?=$cart_id?>">
                <button class="layui-btn" lay-submit="" lay-filter="form" data-form="update">立即支付</button>
            </div>
        </div>

    </div>
</form>
<?=$this->registerJsFile("@web/static/js/page/base/form.js")?>