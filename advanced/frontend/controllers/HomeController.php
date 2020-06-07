<?php

namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class HomeController extends Controller

{
    // public $layout="main1";
    public function actionIndex()

    {
        return $this->render('view');


    }


}






