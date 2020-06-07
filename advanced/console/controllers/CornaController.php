<?php

namespace console\controllers;

use yii\console\Controller;

/**
 * Default controller for the `project` module.
 */
class CornaController extends Controller
{
    public function actionIndex($message = 'jab sath dega sara india phir muskarayega india')
    {
        echo $message.'\n';
    }
}
