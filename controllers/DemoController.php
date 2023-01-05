<?php

namespace app\controllers;

use app\components\BaseController;

use admin\models\AuthPermissionForm;
use admin\models\AuthItem;
use admin\models\permission\search\AuthItemSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\rbac\Item;
use Yii;
use app\models\Demo;
use app\models\search\DemoSearch;
use yii\web\Response;

/**
 * Class PermissionController
 * @package admin\controllers
 */
class DemoController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionList(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        
        $searchModel=new DemoSearch();
        $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
        $data=array_values($dataProvider->getModels());
        $data= ArrayHelper::toArray($data);
        foreach ($data as $key=>$value){
            $data[$key]['add_time'] = Yii::$app->formatter->asDatetime($value['add_time']);
            $data[$key]['update_time'] = Yii::$app->formatter->asDatetime($value['update_time']);
        }
        return $this->FormatLayerTable(
            self::REQUEST_LAY_SUCCESS,'获取成功',$data,$dataProvider->totalCount);
    }
    
    public function actionUpdate(){  
        $this->layout='@app/views/layouts/empty';
        $req = Yii::$app->request;
        $id = $req->get('id');
        $model = Demo::findOne($id);
        if ($req->isPost){
            Yii::$app->response->format=Response::FORMAT_JSON;
            $post = $req->post();
            $info = Demo::findOne($post['id']);
            $info->name = $post['name'];
            $info->desc = $post['desc'];
            $info->update_time = time();
            if ($info->save()) {
                return $this->FormatArray(self::REQUEST_SUCCESS, "修改成功", []);
            }
        }
         else {
            return $this->render('update', ['model' => $model]);
        }   
    }
    
    public function actionDelete(){
        $req = Yii::$app->request;
        Yii::$app->response->format=Response::FORMAT_JSON;
        $id = $req->get('id');
        $model = Demo::findOne($id);
        if ($model->delete()){
            return $this->FormatArray(self::REQUEST_SUCCESS, "删除成功", []);
        }else {
            return $this->FormatArray(self::REQUEST_FAIL, "删除失败",[]);
        }
        
    }
    
    public function actionCreate(){
        $this->layout='@app/views/layouts/empty';
        $req = Yii::$app->request;
        if ($req->isPost){
            Yii::$app->response->format=Response::FORMAT_JSON;
            $post = $req->post();
            $model = new Demo();
            $model['name'] = $post['name'];
            $model['desc'] = $post['desc'];
            $model['add_time'] = time();
            $model['update_time'] = time();
            if ($model->save()){
                return $this->FormatArray(self::REQUEST_SUCCESS, "添加成功", []);             
            }else {
                return $this->FormatArray(self::REQUEST_FAIL, "添加失败",[]);
            }
        }
        return $this->render('create');
    }
}
