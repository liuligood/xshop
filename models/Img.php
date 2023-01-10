<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "img".
 *
 * @property int $id
 * @property resource $old_img 本地图片
 * @property string $src 图片地址
 * @property int $add_time 添加时间
 * @property int $update_time 修改时间
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['old_img', 'add_time', 'update_time'], 'required'],
            [['old_img'], 'string'],
            [['add_time', 'update_time'], 'integer'],
            [['src'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'old_img' => 'Old Img',
            'src' => 'Src',
            'add_time' => 'Add Time',
            'update_time' => 'Update Time',
        ];
    }
}
