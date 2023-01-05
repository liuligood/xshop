<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/11
 * Time: 23:48
 */
namespace app\components;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Class BaseController
 * @package admin\components
 */
class BaseController extends Controller
{
    const REQUEST_SUCCESS=1;
    const REQUEST_FAIL=0;
    const REQUEST_LAY_SUCCESS=0;
    const REQUEST_LAY_FAIL=1;
    const REQUEST_UN_AUTH=-1;
    public static $page_config = ['pageSizeParam' =>'limit','pageSizeLimit'=>[1,1000]];
    public $layout='@app/views/layouts/main';
    public $topMenu = [];         //顶部菜单
    public $leftMenu = [];        //左侧二级菜单
    public $singleDate = false;
    
    
    public $enableCsrfValidation=false;
    public $query;
    protected $cache_count = false;
    protected $substep_query = false;//分步查询
    /*
     * 默认的菜单图标
     * public $defaultIcon = 'glyphicon glyphicon-star';
     */
    public $defaultIcon = '';
    //默认显示菜单图标
    public $activeIcon  = true;

    //权限控制白名单路由
    public $routeWhiteList = [
        'site/captcha',
        'site/login',
        'site/error',
        'site/logout'
    ];


    public function init()
    {
        parent::init();
        $this->getView()->title = Yii::$app->id;
    }

    /**
     * flash message
     */
    private function flash()
    {
        if($this->route == 'site/close-win') {
            return;
        }
        $levels = [0=>'warning',1=>'success',2=>'fail',6=>'info'];
        foreach ($levels as $icon => $level) {
            if(Yii::$app->session->hasFlash($level))
            {
                $msg = Yii::$app->session->getFlash($level);
                $this->getView()->registerJs("
                    layer.msg(\"$msg\", {icon: $icon});
                ");
            }
        }
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        $this->flash();
        if(Yii::$app->user->isGuest &&  !in_array($this->route,$this->routeWhiteList)) {
            $this ->redirect(['/site/login']);
        } else {
            $this->authRoute();
            $menuFilePath = Yii::getAlias('@app/config/menu.php');
            $menuConfig = require_once $menuFilePath;
            $menus = $menuConfig['menu'];
            $activeTag = '';
            $menus = $this->normalizeMenu($menus, $activeTag);
            if (isset($menus[$activeTag]['items'])) {
                $this->leftMenu = $menus[$activeTag]['items'];
            } else {
                $this->leftMenu = [];
            }
            foreach ($menus as $key => $items) {
                unset($menus[$key]['items']);
            }
            $this->topMenu = $menus;
        }
        return parent::beforeAction($action);
    }

    /**
     * @return bool
     * @throws ForbiddenHttpException
     * 验证是否有权限
     */
    private function authRoute()
    {
        if($this->action->id == 'index'){
            $route = trim(str_replace('index','',$this -> route),'/');
        }else{
            $route = trim($this->route,'/');
        }
        $route = trim($route,'/');
        if(!$this->auth($route)) {
            throw new ForbiddenHttpException('无权限访问！');
        } else {
            return true;
        }
    }

    /**
     * @param $route
     * @return bool
     */
    private function auth($route)
    {
        if(in_array($route,$this->routeWhiteList)) {
            return true;
        }
        $route      = '/'.trim($route,'/');
        $arr        = explode('/',trim($route,'/'));
        $auth_route = $arr[0] == $this->id ? $arr[0].'/*' : $route.'/*';
        if(!Yii::$app->user->can('/*') && !Yii::$app->user->can($auth_route) && !Yii::$app->user->can($route))
        {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $item
     * @return bool
     * 判断是否当前url
     */
    private function isItemActive($item){
        $arr = explode('/',$this->route);
        $index = count($arr) - 1;
        if($arr[$index] == 'index'){
            unset($arr[$index]);
            $route = implode('/',$arr);
            if($route == trim($item['url'][0],'/')) {
                return true;
            }
        }else {
            if (stripos('/'.trim($this->route, '/') . '/', '/'.trim($item['url'][0], '/').'/') === 0) {
                return true;
            }
            return false;
        }
    }

    /**
     * @param $menus
     * @param $activeTag
     * @return mixed
     */
    private function normalizeMenu($menus,&$activeTag)
    {
        foreach($menus as $i => $items) {
            $firstUrl = '';
            foreach($items['items'] as $k => $item) {
                if(!empty($item['items'])) {
                    foreach ($item['items'] as $l => $menu) {
                        if (stripos($this->route,trim($menu['url'][0],'/')) === 0) {   //找出当前路由在哪个菜单下
                            $activeTag = $i;
                            $menus[$i]['active']=true;
                        }
                        if(!$this->auth($menu['url'][0])){
                            //删除没有权限的菜单
                            unset($menus[$i]['items'][$k]['items'][$l]);
                            continue;
                        }
                        if($firstUrl == '') {
                            $firstUrl = $menu['url'][0];                      //获取第一个url
                        }
                        if(!isset($menus[$i]['items'][$k]['active'])) {
                            if($this->isItemActive($menu)) {
                                $menus[$i]['items'][$k]['active']=true;
                                $menus[$i]['items'][$k]['items'][$l]['active']=true;
                            }
                        }
                        $iconClass = isset($menu['icon']) ? $menu['icon'] : $this->defaultIcon;
                        $menus[$i]['items'][$k]['items'][$l]['label'] = $this->buildMenusLabel($menu['label'], $iconClass);
                        unset($menus[$i]['items'][$k]['items'][$l]['icon']);
                    }
                    if(empty($menus[$i]['items'][$k]['items'])){
                        unset($menus[$i]['items'][$k]);
                    }else{
                        $menus[$i]['items'][$k]['url'] = ['#'];
                        $iconClass = isset($item['icon']) ? $item['icon'] : $this->defaultIcon;
                        $menus[$i]['items'][$k]['label'] = $this -> buildItemsLabel($item['label'],$iconClass);
                        unset($menus[$i]['items'][$k]['icon']);
                    }
                }else{
                    unset($menus[$i]['items'][$k]);  //删除没有子菜单的菜单
                    continue;
                }
            }
            if(empty($menus[$i]['items'])){
                unset($menus[$i]);
            }else {
                $menus[$i]['url'] = [$firstUrl];
            }
        }
        return $menus;
    }

    /**
     * @param $label
     * @param $iconClass
     * @return string 返回母菜单标签
     */
    private function buildItemsLabel($label,$iconClass)
    {
        $label = $this -> buildMenusLabel($label,$iconClass)
        .Html::tag('span','',['class'=>'glyphicon arrow']);
        return $label;
    }

    /**
     * @param $label
     * @param $iconClass
     * @return string 返回菜单标签
     */
    private function buildMenusLabel($label,$iconClass)
    {
        if($this -> activeIcon) {
            $label = Html::tag('span',"&nbsp;",['class' => $iconClass])
                . $label;
        }
        return $label;
    }

    /**
     * 关闭iframe
     */
    public function closeWindows()
    {
        $this->redirect(['/site/close-win']);
    }
    
    /**
     * @param int $code 状态码
     * @param array $data 数据 请按照layer数组格式
     * @param string $msg 消息内容
     * @param int $count 列表长度
     * @return array
     */
    
    public function FormatLayerTable(int $code , string $msg, array $data,int $count){
        
        return ['code'=>$code,'msg'=>$msg,'data'=>$data,'count'=>$count];
        
    }
    
    /**
     * @param int $code 状态码
     * @param string $msg 错误消息
     * @param array $data 数据
     * @return array
     */
    public function FormatArray($code,$msg,$data = []){
        
        return ['status'=>$code,'msg'=>$msg,'data'=>$data];
    }
}