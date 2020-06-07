<?php

namespace frontend\modules\hospital\models;

use Yii;
use yii\base\Model;
use common\models\Hospital;

/**
 * Signup form.
 */
class Register extends Model
{
    public $patient_name;
    public $email;
    public $password;
    public $dieases_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['patient_name', 'trim'],
            ['patient_name', 'required'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Hospital', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['dieases_name', 'trim'],
            ['dieases_name', 'required'],
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

        $user = new Hospital();
        $user->patient_name = $this->patient_name;
        $user->email = $this->email;
        $user->dieases_name = $this->dieases_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() ;
    }

    /**
     * Sends confirmation email to user.
     *
     * @param User $user user model to with email should be send
     *
     * @return bool whether the email was sent
     */
    // protected function sendEmail($user)
    // {
    //     return Yii::$app
    //         ->mailer
    //         ->compose(
    //             ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
    //             ['user' => $user]
    //         )
    //         ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' robot'])
    //         ->setTo($this->email)
    //         ->setSubject('Account registration at '.Yii::$app->name)
    //         ->send();
    // }
}
