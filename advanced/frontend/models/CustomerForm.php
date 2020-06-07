<?php

namespace frontend\models;

use yii\base\Model;
use common\models\Customer;

class CustomerForm extends Model
{
    public $email;
    public $password;
    public $customername;
    public $customerplan;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['customername', 'required'],
            ['customername', 'string', 'min' => 2, 'max' => 255],

            ['customerplan', 'required'],
            ['customerplan', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This email address has already been taken.'],

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
        
        $user = new Customer();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->customername = $this->customername;
        $user->customerplan = $this->customerplan;
        // $user->status = $status;

        return $user->save();
    }
}
