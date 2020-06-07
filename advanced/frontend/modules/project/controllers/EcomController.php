<?php

namespace frontend\modules\project\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\project\models\RegistrationForm;
use app\modules\project\models\Customer;

/**
 * Default controller for the `project` module.
 */
class EcomController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'errorHandler' => [
                'errorAction' => 'project/ecom/error',
            ],
            // 'captcha' => [
            //     'class' => 'yii\captcha\CaptchaAction',
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            // ],
        ];
    }

    /**
     * Renders the index view for the module.
     *
     * @return string
     */
    public function actionMessage()
    {
        return $this->render('message');
    }

    public function actionEcomregistration()
    {
        $model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');

            return $this->goHome();
        }

        return $this->render('ecomregistration', [
            'model' => $model,
        ]);
    }

    public function actionEcomdisplay()
    {
        $information = Customer::find()->all();

        return $this->render('ecomdisplay', ['informations' => $information]);
    }
}
