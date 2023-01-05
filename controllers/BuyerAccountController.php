<?php

namespace app\controllers;

use Yii;
use app\models\BuyerAccount;
use app\models\search\BuyerAccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\BaseController;
use yii\web\Response;
use app\models\User;

/**
 * BuyerAccountController implements the CRUD actions for BuyerAccount model.
 */
class BuyerAccountController extends BaseController
{

    public function actionView()
    {
        $id = Yii::$app->user->identity->id;
        $model = User::find()->where(['id'=>$id])->select(['username','buyer_id','id'])->asArray()->one();
        return $this->render('view',['model'=>$model]);
    }

    public function actionUpdate()
    {
        $this->layout='@app/views/layouts/empty';
        $req = Yii::$app->request;
        $id = $req->get('id');
        $model = User::findOne($id);
        if ($req->isPost){
            Yii::$app->response->format=Response::FORMAT_JSON;
            $post = $req->post();
            $account = $post['buyer_id'];
            if ($account == 0){
                return $this->FormatArray(self::REQUEST_FAIL, "金额不能为0",[]);
            }
            if ($account < 50){
                return $this->FormatArray(self::REQUEST_FAIL, "金额最少为50",[]);
            }
            if ($account % 50 != 0){
                return $this->FormatArray(self::REQUEST_FAIL, "金额必须为5的倍数",[]);
            }
            $info = User::findOne($post['id']);
            $info['buyer_id'] = $info['buyer_id'] + $account;
            if ($info->save()){
                return $this->FormatArray(self::REQUEST_SUCCESS, "充值成功", []);               
            }
        }
        return $this->render('update',['model'=>$model]);
    }

}
