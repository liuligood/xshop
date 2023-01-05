<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buyer_account".
 *
 * @property int $id
 * @property string $account 账号
 * @property string $name 名称
 * @property string $account_password 支付密码
 * @property string $amount 现有金额
 * @property int $add_time
 * @property int $update_time
 */
class BuyerAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buyer_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount'], 'number'],
            [['add_time', 'update_time'], 'required'],
            [['add_time', 'update_time'], 'integer'],
            [['account', 'account_password'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => 'Account',
            'name' => 'Name',
            'account_password' => 'Account Password',
            'amount' => 'Amount',
            'add_time' => 'Add Time',
            'update_time' => 'Update Time',
        ];
    }
}
