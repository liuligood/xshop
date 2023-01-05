<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $price 价格
 * @property string $goods 货物量
 * @property int $status 分类
 * @property string $order_img 图片
 */
class Order extends \yii\db\ActiveRecord
{
    const CATEGORY_PHONE = 0; //手机
    const CATEGORY_HOME = 1;  //家居
    const GOODS_UP_STATUS = 1; //上架
    const GOODS_DOWN_STATUS = 0; //未上架
    
    public static $cartegory_mapping = [
        self::CATEGORY_PHONE => '手机',
        self::CATEGORY_HOME => '家居',
    ];
    
    public static $goods_status_mapping = [
        self::GOODS_DOWN_STATUS => '未上架',
        self::GOODS_UP_STATUS => '上架',
    ];
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'goods','now_goods','goods_status','add_time', 'update_time'], 'number'],
            [['status'], 'integer'],
            [['order_img'], 'required'],
            [['order_img'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'goods' => 'Goods',
            'status' => 'Status',
            'order_img' => 'Order Img',
        ];
    }
}
