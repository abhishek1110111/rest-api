<?php 
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\base\InvalidArgumentException;
use frontend\models\Shopper;
use common\models\Shopping;

class ShopController extends Controller
{
	/**
     * {@inheritdoc}
     */
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

    public function actionIndex(){
    	return print_r("welcome");
    }

    public function actionCreate()
    {
        $model = new Shopper();
        if($model->load(Yii::$app->request->post()) && $model->createsignup()){
            return $this->redirect('display');
        }
		return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDisplay()
    {
    	$sql= Shopping::find()->asArray()->all();
    	return $this->render('display',[
    		'sql'=>$sql,
    	]);
    }

    public function actionUpdate(){
    	if(Yii::$app->request->get('id') && Yii::$app->request->get('action')=='edit'){
    	$model = Shopping::findOne(['ID' => Yii::$app->request->get('id')]);
    	$model->name="karan";
    	$model->product="shoes";
    	$model->update();
    	}
    	return $this->redirect('display');
    }
    
    public function actionDelete(){
    	if(Yii::$app->request->get('id') && Yii::$app->request->get('action')=='delete'){
    	$model = Shopping::findOne(['ID' => Yii::$app->request->get('id')]);
    	$model->delete();
    	}
    	return $this->redirect('display');
    }



}

?>