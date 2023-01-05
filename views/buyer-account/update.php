<?php
use yii\helpers\Url;
?>
<style>
    html {
        background: #fff;
    }
</style>
<form class="layui-form layui-row" id="update" action="<?=Url::to(['buyer-account/update'])?>">

    <div class="layui-col-md6 layui-col-xs12" style="padding-top: 15px">

        <div class="layui-form-item">
            <label class="layui-form-label">充值金额</label>
            <div class="layui-input-block">
                <input type="text" name="buyer_id" lay-verify="required" placeholder="请输入金额,最少充值50,必须为5的倍数"   class="layui-input ">
            </div>
        </div>
        
        <div class="layui-form-item">
            <label class="layui-form-label">当前余额</label>
            <div class="layui-input-block">
                <label class="layui-form-label" style="text-align: left"><?=$model['buyer_id']?></label>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="id" value="<?=$model['id']?>">
                <button class="layui-btn" lay-submit="" lay-filter="form" data-form="update">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>

    </div>
</form>
<?=$this->registerJsFile("@web/static/js/page/base/form.js")?>