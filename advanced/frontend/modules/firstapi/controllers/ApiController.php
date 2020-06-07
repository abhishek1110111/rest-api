<?php
namespace frontend\modules\firstapi\Controllers;

use Yii;
use yii\web\Controller;
use GuzzleHttp\Client;





class ApiController extends Controller
{
    // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    // Const APPLICATION_ID = 'ASCCPE';

    // /**
    //  * Default response format
    //  * either 'json' or 'xml'
    //  */
    // private $format = 'json';
    // /**
    //  * @return array action filters
    //  */
    // public function filters()
    // {
    //         return array();
    // }

    // Actions

    public function actionIndex()
    {
        // return $this->render('index');
        echo "hello";
    }
    public function actionList()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://api.github.com/user');
        echo $res->getStatusCode();
        echo $res->getHeader('content-type')[0];
        echo $res->getBody();
    }
    public function actionView()
    {
    }
    public function actionCreate()
    {
    }
    public function actionUpdate()
    {
    }
    public function actionDelete()
    {
    }
}