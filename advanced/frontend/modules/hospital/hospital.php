<?php

namespace frontend\modules\hospital;

use yii;

/**
       * project module definition class.
       */
      class hospital extends \yii\base\Module
      {
          /**
           * {@inheritdoc}
           */
          public $controllerNamespace = 'frontend\modules\hospital\controllers';

          /**
           * {@inheritdoc}
           */
          public function init()
          {
              parent::init();
              yii::$app->errorHandler->errorAction = 'hospital/patient/error';

              // custom initialization code goes here
          }
      }
