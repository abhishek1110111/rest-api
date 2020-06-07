<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form.
 */
class CustomerLogin extends Model
{
    public $email;
    public $password;
    // public $rememberMe = true;

    private $_user;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            // ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
             ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        
        return false;
    }
    protected function getUser()
    {
       
       
        if ($this->_user === null) {
            $this->_user = Customer::findByEmail($this->email);
        }

        return $this->_user;
    }

    /*
     * Finds user by [[username]].
     *
     * @return User|null
     */
    // protected function getUser()
    // {
    //     // if ($this->_user === null) {
    //     //$this->_user = CustomerRegistration::findByUsername($this->email);
    //     $customer = CustomerRegistration::find()
    //                 ->where(['email' => $this->email])
    //                 ->one();
    //     // }

    //     return $customer;
    // }
}
