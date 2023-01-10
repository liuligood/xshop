<?php

namespace app\controllers;
use app\components\BaseController;
use app\models\Img;
use common\services\ImportResultService;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Yii;
use yii\helpers\FileHelper;
use yii\web\Response;
use yii\web\UploadedFile;

class AppController extends BaseController
{

    /**
     * @routeName 编辑图片
     * @routeDescription 编辑图片
     * @inheritdoc
     * @todo
     */
    public function actionEditImg()
    {
        return $this->render('edit_img');
    }

    /**
     * @routeName 上传图片
     * @routeDescription 上传图片
     * @inheritdoc
     * @todo
     */
    public function actionUploadImg()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $images = UploadedFile::getInstancesByName("file");
        if (count($images) <= 0) {
            return $this->FormatArray(self::REQUEST_FAIL, "上传文件不能为空");
        }

        $image = current($images);

        if ($image->size > 5 * 1024 * 1024) {
            return $this->FormatArray(self::REQUEST_FAIL, "图片最大不可超过5M");
        }
        if (!in_array(strtolower($image->extension), array('gif', 'jpg', 'jpeg', 'png'))) {
            return $this->FormatArray(self::REQUEST_FAIL, "请上传标准图片文件, 支持gif,jpg,png和jpeg.");
        }
        $result = \Yii::$app->Aliyunoss->upload_file($image);
        if(!$result){
            return $this->FormatArray(self::REQUEST_FAIL, '上传失败');
        }

        $data = [];
        $data['img'] = $result;
        return $this->FormatArray(self::REQUEST_SUCCESS, "上传成功", $data);
    }

    /**
     * @routeName 上传图片
     * @routeDescription 上传图片
     * @inheritdoc
     * @todo
     */
    public function actionTinymceUploadImg()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $images = UploadedFile::getInstancesByName("edit");
        if (count($images) <= 0) {
            return $this->FormatArray(self::REQUEST_FAIL, "上传文件不能为空");
        }

        $image = current($images);

        if ($image->size > 2048 * 1024) {
            return ['code' => self::REQUEST_LAY_FAIL, 'msg' => "图片最大不可超过2M", 'data' => ''];
        }
        if (!in_array(strtolower($image->extension), array('gif', 'jpg', 'jpeg', 'png'))) {
            return ['code' => self::REQUEST_LAY_FAIL, 'msg' => "请上传标准图片文件, 支持gif,jpg,png和jpeg.", 'data' => ''];
        }

        return ['code' => self::REQUEST_LAY_SUCCESS, 'msg' => "上传成功", 'data' => $image];
    }


    /**
     * @routeName 导出错误excel文件
     * @routeDescription 导出上传的错误excel文件
     * @inheritdoc
     * @todo
     */
    public function actionGetImportResult()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;
        $key = $req->get('key');
        return (new ImportResultService())->getExcel($key);
    }

    /**
     * @routeName 上传文件
     * @routeDescription 上传文件
     * @inheritdoc
     * @todo
     */
    public function actionUploadFile()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $files = UploadedFile::getInstancesByName("file");
        if (count($files) <= 0) {
            return $this->FormatArray(self::REQUEST_FAIL, "上传文件不能为空");
        }

        $file = current($files);

        if ($file->size > 5 * 1024 * 1024) {
            return $this->FormatArray(self::REQUEST_FAIL, "文件最大不可超过5M");
        }
        /*if (!in_array(strtolower($image->extension), array('gif', 'jpg', 'jpeg', 'png'))) {
            return $this->FormatArray(self::REQUEST_FAIL, "请上传标准图片文件, 支持gif,jpg,png和jpeg.");
        }*/

        $result = \Yii::$app->oss->upload($file);
        if(!$result){
            return $this->FormatArray(self::REQUEST_FAIL, '上传失败');
        }

        $data = [];
        $data['file'] = $result;
        return $this->FormatArray(self::REQUEST_SUCCESS, "上传成功", $data);
    }

}