<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "demo".
 *
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $add_time
 * @property int $update_time
 */
class Demo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'demo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['add_time', 'update_time'], 'integer'],
            [['name', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'desc' => 'Desc',
            'add_time' => 'Add Time',
            'update_time' => 'Update Time',
        ];
    }
}
