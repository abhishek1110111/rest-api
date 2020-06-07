<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

class Customer extends ActiveRecord implements IdentityInterface
{
    // public $password_hash;
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }
    // public function behaviors()
    // {
    //     return [
    //        TimestampBehavior::className(),
    //     ];
    // }
    public function rules()
    {
        return [
           ['status', 'default', 'value' => self::STATUS_INACTIVE],
           ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public static function findByCustomername($customername)
    {
        return static::findOne(['customername' => $customername, 'status' => self::STATUS_ACTIVE]);
    }
    public static function findByCustomerplan($customerplan)
    {
        return static::findOne(['customerplan' => $customerplan, 'status' => self::STATUS_ACTIVE]);
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
