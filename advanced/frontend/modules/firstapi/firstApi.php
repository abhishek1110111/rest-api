<?php

namespace frontend\modules\firstapi;
use Yii;
/**
 * firstapi module definition class
 */
class firstApi extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\firstapi\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        //yii::$app->errorHandler->errorAction = 'firstapi/default/error';
        // custom initialization code goes here
    }
}
