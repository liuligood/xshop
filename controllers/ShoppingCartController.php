<?php

namespace app\controllers;

use Yii;
use app\models\ShoppingCart;
use app\models\search\ShoppingCartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\BaseController;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use app\models\Order;
use app\models\User;


class ShoppingCartController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }
    
    public function actionList(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        $searchModel=new ShoppingCartSearch();
        $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
        $data=array_values($dataProvider->getModels());
        $data= ArrayHelper::toArray($data);
        foreach ($data as $key=>$value){
            $image = json_decode($value['order_img'], true);
            $data[$key]['goods_img'] = empty($image) || !is_array($image) ? '' : current($image)['img'];
            $order = Order::find()->where(['id'=>$value['order_id']])->asArray()->one();
            if ($order['goods_status'] == 0){
                $data[$key]['goods_status'] = 0;
            }
        }
        return $this->FormatLayerTable(
            self::REQUEST_LAY_SUCCESS,'获取成功',$data,$dataProvider->totalCount);   
    }
    
    public function actionCreate(){
        $req = Yii::$app->request;
        Yii::$app->response->format=Response::FORMAT_JSON;
        $user_id = Yii::$app->user->identity->id;
        $id = $req->get('id');
        $model = Order::findOne($id);
        $info = ShoppingCart::find()->where(['order_id'=>$id])->one();
        if (empty($info)){
            $info = new ShoppingCart();
            $info['price'] = $model['price'];
            $info['number'] = 1;
            $info['order_id'] = $id;
            $info['title'] = $model['title'];
            $info['order_img'] = $model['order_img'];
            $info['user_id'] = $user_id;
        }else if ($info['user_id'] == $user_id){
            $info['number'] = $info['number'] + 1;
        } else {
            $info = new ShoppingCart();
            $info['price'] = $model['price'];
            $info['number'] = 1;
            $info['order_id'] = $id;
            $info['title'] = $model['title'];
            $info['order_img'] = $model['order_img'];
            $info['user_id'] = $user_id;
        }
        if ($info->save()){
            return $this->FormatArray(self::REQUEST_SUCCESS, "加入购物车成功", []);
        }else {
            return $this->FormatArray(self::REQUEST_FAIL, "加入购物车失败", []);    
        }
    }
    
    public function actionSumCart(){
        $this->layout='@app/views/layouts/empty';
        $req = Yii::$app->request;
        $user_id = \Yii::$app->user->identity->id;
        $id = $req->get('id');
        $model_id = explode(',', $id);
        $num = 0;
        $price = 0;
        $user = User::findOne($user_id);
        foreach ($model_id as $v){
            $info = ShoppingCart::findOne($v);
            $num += $info['number'];
            $price += $info['price'] * $info['number'];
        }
        $account = $user['buyer_id'];
        $now_account = $account - $price;
        if ($req->isPost){
            Yii::$app->response->format=Response::FORMAT_JSON;
            $post = $req->post();
            $user = User::findOne($post['id']);
            $user['buyer_id'] = $post['account'];
            $id = $post['cart_id'];
            $model_id = explode(',', $id);
            if ($user['buyer_id']<0){
                return $this->FormatArray(self::REQUEST_FAIL, "余额不足", []);
            }
            foreach ($model_id as $v){
                $shop = ShoppingCart::findOne($v);
                $order = Order::findOne($shop['order_id']);
                if ($order['goods_status'] == 0){
                    $title = mb_substr($order['title'], 0,10);  
                    return $this->FormatArray(self::REQUEST_FAIL, $title."已经下架,无法购买", []);
                }
            }
            if ($user->save()){
                $shop->delete();
                return $this->FormatArray(self::REQUEST_SUCCESS, "支付成功", []);
            }
        }
        return $this->render('sum_cart',['num'=>$num,'price'=>$price,'account'=>$account,'now_account'=>$now_account,'user_id'=>$user_id,'cart_id'=>$id]);
    }
    
    public function actionUpdate(){
        $this->layout='@app/views/layouts/empty';
        $req = Yii::$app->request;
        $id = $req->get('id');
        $model = ShoppingCart::findOne($id);
        if ($req->isPost){
            Yii::$app->response->format=Response::FORMAT_JSON;
            $post = $req->post();
            $info = ShoppingCart::findOne($post['id']);
            if ($post['number'] > $info['number']){
                return $this->FormatArray(self::REQUEST_FAIL, "数量不能大于原始的", []);
            }
            $info['number'] = $post['number'];
            $info->save();
            return $this->FormatArray(self::REQUEST_SUCCESS, "修改成功", []);
        }
        return $this->render('update',['model'=>$model]);
    }
    
    public function actionDelete(){
        $req = Yii::$app->request;
        Yii::$app->response->format=Response::FORMAT_JSON;
        $id = $req->get('id');
        $model = ShoppingCart::findOne($id);
        if ($model->delete()){
            return $this->FormatArray(self::REQUEST_SUCCESS, "删除成功", []);
        }
    }
}
