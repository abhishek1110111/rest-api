<?php

namespace frontend\modules\api\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use frontend\modules\api\models\Employee;
class EmployeeController extends Controller
{
	public $enableCsrfValidation=false;
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate(){
    	Yii::$app->response->format = Response::FORMAT_JSON;
    	$employee = new Employee();
    	$employee->scenario= Employee::SCENARIO_CREATE;
    	$employee->attributes= Yii::$app->request->post();
    	if($employee->validate()){
    		$employee->save();
   		 	return array('status' => true,'data' =>'post data sucessfully');
   		}
   		else{
   			return array('status' => false,'data'=> $employee->getErrors());   		
   		}
    }

    public function actionList(){
    	Yii::$app->response->format = Response::FORMAT_JSON;
    	$employee =Employee::find()->all();
    	if(count($employee)>0){
    		return array('status' =>true,'data'=>$employee);
       	}
       	else{
       		return array('status' => false, 'data'=>'data not found');
       	}
    }

    public function actionView(){
    	Yii::$app->response->format = Response::FORMAT_JSON;
    	$employee =Employee::findOne(['empid' => Yii::$app->request->get('id')]);
    	
    	if($employee){
    		return array('status'=> true,'data'=>$employee);
    	}
    	else{
    		return array('status' => false, 'data'=>'data not found');
    	}

    }

    // public function actionUpdate(){
    // 	$employee =new Employee();
    // 	Yii::$app->response->format = Response::FORMAT_JSON;
    // 	// if(Yii::$app->request->get('id') && Yii::$app->request->get('action')=='edit'){
    // 	$employee = Employee::findOne(['empid' => Yii::$app->request->get('id')]);
    // 	// $employee->empname="karan";
    // 	// $employee->empdesignation="shoes";
    // 	// $employee->empdepartment=""
    // 	// $employee->update();
    // 	// }

    // 	$employee->scenario= Employee::SCENARIO_CREATE;
    // 	$employee->attributes= Yii::$app->request->post();
    // 	if($employee->validate()){
    // 		$employee->update();
   	// 	 	return array('status' => true,'data' =>'updated data sucessfully');
   	// 	}
   	// 	else{
   	// 		return array('status' => false,'data'=> $employee->getErrors());   		
   	// 	}
    	
    // }

    public function actionDelete(){
    	Yii::$app->response->format = Response::FORMAT_JSON;
    	$employee =Employee::findOne(['empid' => Yii::$app->request->get('id')]);
    	$employee->delete();
    	$employee = Employee::find()->all();
    	if(count($employee)>0){
    		return array('status'=> true,'data'=>$employee);
    	}
    	else{
    		return array('status' => false, 'data'=>'data not found');
    	}

    }

 //    public function actionDelete()
	// {
	//     switch($_GET['model'])
	//     {
	//         // Load the respective model
	//         case 'posts':
	//             $model = Emloyee::findByPk($_GET['id']);                    
	//             break;
	//         default:
	//             $this->_sendResponse(501, 
	//                 sprintf('Error: Mode <b>delete</b> is not implemented for model <b>%s</b>',
	//                 $_GET['model']) );
	//             exit;
	//     }
	//     // Was a model found? If not, raise an error
	//     if(is_null($model))
	//         $this->_sendResponse(400, 
	//                 sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",
	//                 $_GET['model'], $_GET['id']) );

	//     // Delete the model
	//     $num = $model->delete();
	//     if($num>0)
	//         $this->_sendResponse(200, 
	//                 sprintf("Model <b>%s</b> with ID <b>%s</b> has been deleted.",
	//                 $_GET['model'], $_GET['id']) );
	//     else
	//         $this->_sendResponse(500, 
	//                 sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.",
	//                 $_GET['model'], $_GET['id']) );
	// }
}
