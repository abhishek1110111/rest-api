<?php

namespace frontend\modules\hospital\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\hospital\models\Register;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
//use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Message\Response;
// use app\modules\project\models\;

/**
 * Default controller for the `project` module.
 */
class PatientController extends Controller
{
	  public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            // 'errorHandler' => [
            //     'errorAction' => 'hospital/ecom/error',
            // ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    //Guzzle api for fetching data
     public function actionIndex()
       {
           $client = new Client();
           $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');

          // echo $response->getStatusCode(); // 200
         //  echo $response->getHeaderLine('application/json'); // 'application/json; charset=utf8'
           $response= $response->getBody();
           $data=json_decode($response,true);
//           echo json_encode($data);
//           echo($data);
//           print_r($data);
//           die();
//           foreach($data as $key=>$value)
//           {
//                   echo($value['id']);
//
//           }
           return $this->render('index',['data'=>$data]);
       }

    public function actionMessage()
    {
        return $this->render('message');
    }

    public function actionSignup()
    {
        $model = new Register();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');

            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
