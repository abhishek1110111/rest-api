<?php

namespace frontend\modules\firstapi\controllers;

//use yii\web\Controller;
//use GuzzleHttp\Client;

use yii;
use yii\web\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use frontend\modules\myapi\models\Post;
use frontend\modules\firstapi\models\Send;


/**
 * Default controller for the `firstapi` module
 */
class DefaultController extends Controller
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

    /**
     * Renders the index view for the module
     * @return string
     */
   public function actionIndex()
    {
        $client = new Client();

        // try {
            $token = 'accepted';
            $headers = [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ];
            $response = $client->request('GET', 'http://localhost/yii_app/yiiserver/frontend/web/myapi/person',
                ['headers' => $headers]);
            $response = $response->getBody();
            $data = json_decode($response, true);

            return $this->render('index', ['data' => $data]);
        }

	public function actionEdit()
	{	$model= new Send();
		if($model->load(Yii::$app->request->post())){
			$client = new Client();
			$token = 'accepted';
            $headers = [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ];
			$response = $client->request('PUT', 'http://localhost/yii_app/yiiserver/frontend/web/myapi/person/'.Yii::$app->request->get("id"),['headers' => $headers,
		    	'form_params' => [ 
		        'title' => $model->title,
		        'body' => $model->body,
		        'access_token' => 'accepted'
		    ]]);
			//echo $res->getBody();
			//return $this->render('index',['data'=>$data]);
		 	$response=$response->getbody();
		 	return $this->redirect('index');
		}

		if(Yii::$app->request->get("id")){
			$model =new Send();
			$client = new Client();
			$token = 'accepted';
            $headers = [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ];
            $response = $client->request('GET', 'http://localhost/yii_app/yiiserver/frontend/web/myapi/person/'.Yii::$app->request->get("id"),
                ['headers' => $headers]);
            $response = $response->getBody();
            $data = json_decode($response, true);
       		return $this->render('edit',['model'=>$model,'data'=>$data]);
       	}
	}

	public function actionCreate()
	{	$model= new Send();
		if($model->load(Yii::$app->request->post())){
			print_r([ $model->title,$model->body]);
			$client = new Client();
			$token = 'accepted';
            $headers = [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ];
			$response = $client->request('POST', 'http://localhost/yii_app/yiiserver/frontend/web/myapi/person/create', ['headers' => $headers,
		    		'form_params' => [
		        	'title' => $model->title,
		        	'body' => $model->body,
		        	'access_token'=>'accepted',
		    		]
				]);
			$response=$response->getbody();
			return $this->redirect('index');
			// print_r("<pre>");
			// print_r($model);
			// print_r("</pre>");
		}
		return $this->render('create',['model'=>$model,]);
		// $client = new Client();
		// $response = $client->request('POST', 'http://localhost/advanced/frontend/web/myapi/person/create', [
		//     'form_params' => [
		//         'title' => 'ab',
		//         'body' => 'hrr'
		//     ]]);
		// $response=$response->getbody();
  //      	echo($response);
	
		// echo $response->getBody();
		// return $this->render('create',['data'=>$response]);
		// print_r(json_decode($response->getBody(),true));
	}

	public function actionDelete()
	{
		$client = new Client();
		$token = 'accepted';
            $headers = [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ];
		$response=$client->delete('http://localhost/yii_app/yiiserver/frontend/web/myapi/person/'.Yii::$app->request->get("id"), ['headers' => $headers]);
		//echo $response->getBody();
		$response=$response->getbody();
        return $this->redirect('index');
	}
}
