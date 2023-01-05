<?php
use yii\helpers\Url;
?>
<style>
    html {
        background: #fff;
    }
</style>

    <div class="layui-col-md6 layui-col-xs12" style="padding-top: 15px;margin-top: 15px;margin-left: 35px;">

        <div class="layui-form-item">
            <label class="layui-form-label" style="font-size:16px">您的账号：</label>
            <div class="layui-input-block">
            <label class="layui-form-label" style="font-size:16px"><?=$model['username']?></label>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label" style="font-size:16px">余额：</label>
            <div class="layui-input-block">
                <label class="layui-form-label" style="font-size:16px"><?=$model['buyer_id']?></label>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
			<div class="lay-lists">            
				<a class="layui-btn layui-btn-normal layui-btn-xm" data-type="open" data-width="1000px" data-height="450px" data-url="<?=Url::to(['buyer-account/update?id='.$model['id']])?>"  data-title="充值余额">充值余额</a>
            </div>
            </div>
        </div>

    </div>
<?=$this->registerJsFile("@web/static/js/page/base/lists.js")?>