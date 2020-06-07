<?php
namespace frontend\modules\myapi\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;

class PersonController extends ActiveController
{
	 public $modelClass = 'common\models\Post';

       public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
        ];
        $behaviors ['rateLimiter'] = [
        'class' => RateLimiter :: className (),
        'enableRateLimitHeaders' => true,
    ];
        return $behaviors;
    }
	 
    
}
 