<?php 
namespace frontend\controllers;
use yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use app\models\Musical;

class MusicController extends Controller
{
	
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionCachedisplay()
    {
        $data = yii::$app->cache->multiGet(['keys']);

        return $this->render('cachedisplay', ['data' => $data]);
    }


    public function actionIndex()
    {
        $model = new Musical();
        if ($model->load(yii::$app->request->post())) {
            
            $name = $model->name;
            $instrument = $model->instrument;
            $mobile = $model->mobile;
           
            $data = yii::$app->cache->multiGet(['keys']);
            if ($data['keys'] == '') {
                yii::$app->cache->multiSet(['keys' => [['name' => $name, 'instrument' =>$instrument, 'mobile' => $mobile]]]);
            } else {
                foreach ($data as $key => $value) {
                    $arr = array(array('name' => $name, 'instrument' => $instrument, 'mobile' => $mobile));
                    $result = array_merge($value, $arr);
                    yii::$app->cache->multiSet(['keys' => $result]);
                }
            }

            // return $this->render('cachedisplay', ['data' => $data]);
        }
        else{
        return $this->render('musicform', ['model' => $model]);
    }

	// public function actionIndex()
	// {
	// 	 $model= new Musical();
		

	// 	// $name=$model->rus();
	// 	 if ($model->load(Yii::$app->request->post()) && $model->musicsignup()){
	// 	 	// $model->name=$this->$name;
	// 	 	// $model->instrument=$this->$instrument;
	// 	 	// $model->mobile=$this->$mobile;
	// 	 	// $model->save();
	// 	 return $this->render('musicform',['model'=>$model]);
	// 	}
	// 	else{
	// 		 return $this->render('musicform',['model'=>$model]);
	// 	}
	// }
}
}
?>