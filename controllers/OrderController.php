<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\search\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\BaseController;
use yii\web\Response;
use yii\helpers\ArrayHelper;


class OrderController extends BaseController
{
    public function actionIndex(){
        $list = Order::find()->where(['status'=>0,'goods_status'=>1])->asArray()->all();
        foreach ($list as &$v){
            $image = json_decode($v['order_img'], true);
            $v['order_img'] = empty($image) || !is_array($image) ? '' : current($image)['img'];
            $v['now_percent'] = round($v['now_goods'] / $v['goods'],2) * 100;
        }
        return $this->render('index',['list'=>$list]);
    }
    
    public function actionList(){
        Yii::$app->response->format=Response::FORMAT_JSON;  
        $searchModel=new OrderSearch();
        $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
        $data=array_values($dataProvider->getModels());
        $data= ArrayHelper::toArray($data);
        foreach ($data as $key=>$value){
            $image = json_decode($value['order_img'], true);
            $data[$key]['goods_img'] = empty($image) || !is_array($image) ? '' : current($image)['img'];
            $data[$key]['add_time'] = Yii::$app->formatter->asDatetime($value['add_time']);
            $data[$key]['update_time'] = Yii::$app->formatter->asDatetime($value['update_time']);
            $data[$key]['goods_status'] = Order::$goods_status_mapping[$value['goods_status']];
            $data[$key]['status'] = Order::$cartegory_mapping[$value['status']];
        }
        return $this->FormatLayerTable(
            self::REQUEST_LAY_SUCCESS,'获取成功',$data,$dataProvider->totalCount);        
    }
    
    public function actionGoodsIndex(){
        return $this->render('goods_index');
    }
    
    public function actionUpdate(){
        $this->layout='@app/views/layouts/empty';
        $req = Yii::$app->request;
        $id = $req->get('id');
        $model = Order::findOne($id);
        if ($req->isPost){
            Yii::$app->response->format=Response::FORMAT_JSON;
            $post = $req->post();
            $info = Order::findOne($post['id']);
            $info['title'] = $post['title'];
            $info['price'] = $post['price'];
            $info['goods'] = $info['goods'] + $post['goods'];
            $info['now_goods'] = $info['now_goods'] + $post['goods'];
            $info['status'] = $post['status'];
            $info['order_img'] = $post['goods_img'];
            $info['update_time'] = time();
            if ($info->save()){
                return $this->FormatArray(self::REQUEST_SUCCESS, "更新成功", []);
            }
        }
        return $this->render('update',['model'=> $model]);
    }
    
    
    public function actionCreate(){
        $this->layout='@app/views/layouts/empty';
        $req = Yii::$app->request;
        if ($req->isPost){
            Yii::$app->response->format=Response::FORMAT_JSON;
            $post = $req->post();
            $info = new Order();
            $info['title'] = $post['title'];
            $info['price'] = $post['price'];
            // $info['status'] = $post['status'];
            $info['goods'] = $post['goods'];
            $info['goods_status'] = $post['goods_status'];
            $info['order_img'] = $post['goods_img'];
            $info['update_time'] = time();
            $info['add_time'] = time();
            if ($info->save()){
                return $this->FormatArray(self::REQUEST_SUCCESS, "添加成功", []);
            }
        }
        return $this->render('create');
    }
    
    public function actionDelete(){
        $req = Yii::$app->request;
        Yii::$app->response->format=Response::FORMAT_JSON;
        $id = $req->get('id');
        $model = Order::findOne($id);
        if ($model->delete()){
            return $this->FormatArray(self::REQUEST_SUCCESS, "删除成功", []);
        }
    }

    //批量上下架
    public function actionBath(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;
        $status = $req->get('status');
        $id = $req->post('id',[]);
        if ($status == 1){
            foreach ($id as $v){
                $model = Order::findOne($v);
                if ($model['goods_status'] == 1){
                    continue;
                }else {
                    $model['goods_status'] = 1;
                }
                $model->save();
            }
                return $this->FormatArray(self::REQUEST_SUCCESS, "上架成功", []);               
        }else {
            foreach ($id as $v){
                $model = Order::findOne($v);
                if ($model['goods_status'] == 0){
                    continue;
                }else {
                    $model['goods_status'] = 0;
                }
                $model->save();
            }
            return $this->FormatArray(self::REQUEST_SUCCESS, "下架成功", []);
        }
    }
    
    public function actionUpdateStatus(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;
        $id = (int)$req->get('id');
        $status = $req->get('status');
        $model = Order::findOne($id);
        if ($status == 1){
            $model['goods_status'] = 1;
        }else{
            $model['goods_status'] = 0;
        }
        if ($model->save()) {
            return $this->FormatArray(self::REQUEST_SUCCESS, "修改成功", []);
        } else {
            return $this->FormatArray(self::REQUEST_FAIL, "修改失败", []);
        }
    }
    
}