<?php

namespace frontend\modules\project\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form.
 */
class RegistrationForm extends Model
{
    public $customer_name;
    public $email;
    public $password;
    public $customer_plan;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->customer_name = $this->customer_name;
        $user->email = $this->email;
        $user->customer_plan = $this->customer_plan;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user.
     *
     * @param User $user user model to with email should be send
     *
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at '.Yii::$app->name)
            ->send();
    }
}
