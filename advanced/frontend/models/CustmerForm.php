<?php

namespace frontend\models;

use yii\base\Model;
use common\models\CustomerRegistration;

class CustomerForm extends Model
{
    public $email;
    public $password;
    public $customer_name;
    public $customer_plan;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['customer_name', 'required'],
            ['customer_name', 'string', 'min' => 2, 'max' => 255],

            ['customer_plan', 'required'],
            ['customer_plan', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\CustomerRegistration', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],
            ['password', 'match', 'pattern' => '/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/'],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }
        $status = 0;
        $user = new CustomerRegistration();
        $user->email = $this->email;
        $user->password_hash = $this->password;
        //$user->generateAuthKey();
        $user->customer_name = $this->customer_name;
        $user->customer_plan = $this->customer_plan;
        $user->status = $status;

        return $user->save();
    }
}
