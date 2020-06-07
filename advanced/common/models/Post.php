<?php
namespace common\models;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\filters\RateLimitInterface;

class Post extends ActiveRecord implements IdentityInterface,RateLimitInterface
{
    // public $rateLimit;
    // public $allowance; 
    public $rateLimit = 1;
    public $allowance;
    public $allowance_updated_at;
//    public function getRateLimit($request, $action)
//    {
//        return [1, 2]; // $rateLimit requests per second
//        //1 request per 2 second
//    }
    public function getRateLimit($request, $action) {
        return [$this->rateLimit,1];

    }

    public function loadAllowance($request, $action)
    {
        return [$this->allowance, $this->allowance_updated_at];
    }

    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $this->allowance = $allowance;
        $this->allowance_updated_at = $timestamp;
        $this->save();
    }


    //const STATUS_ACTIVE = 10;

    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['body'], 'string'],
            [['title'], 'string', 'max' => 512],
            
            ['access_token','string'],


        ];
    }


     /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        //die("vjjb");
        return static::findOne(['id' => $id]);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {


        return static::findOne(['access_token' => $token]);
    }

    public function validateAuthKey($authKey)
    {
        //return $this->getAuthKey() === $authKey;
        return;
    }


    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //return $this->auth_key;
        return;
    }


}
