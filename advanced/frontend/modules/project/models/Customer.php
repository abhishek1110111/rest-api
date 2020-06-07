<?php

namespace app\modules\project\models;

use yii\db\ActiveRecord;

class Customer extends ActiveRecord
{
    private $customer_id;
    private $email;
    private $customer_name;
    private $customer_plan;
    private $password_hash;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //['customer_id', 'trim'],
            ['customer_id', 'required'],

            ['customer_name', 'trim'],
            ['customer_name', 'required'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['customer_plan', 'trim'],
            ['customer_plan', 'required'],
        ];
    }
}
