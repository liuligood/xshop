<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shopping_cart".
 *
 * @property int $id
 * @property int $order_id 商品id
 * @property string $order_img 商品主图
 * @property string $title 商品标题
 * @property int $number 数量
 * @property string $price 价格
 * @property int $user_id 购物者id
 */
class ShoppingCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shopping_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'number', 'user_id'], 'integer'],
            [['order_img'], 'required'],
            [['order_img'], 'string'],
            [['price'], 'number'],
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
            'order_id' => 'Order ID',
            'order_img' => 'Order Img',
            'title' => 'Title',
            'number' => 'Number',
            'price' => 'Price',
            'user_id' => 'User ID',
        ];
    }
}
