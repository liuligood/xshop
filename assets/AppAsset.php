<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/plugins/layui/css/layui.css?v=2.6.10',//这个必须先引入
    ];
    public $js = [
        'static/plugins/layui/layui.js?v=2.6.10',
        'static/js/lay-sys/layui.util.js',
        'static/js/lay-sys/javascript.util.js',
        'static/js/lay-sys/jquery.util.js',
        'static/plugins/jquery.min.js',
    ];
}
