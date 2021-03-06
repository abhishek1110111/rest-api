<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
      'modules' => [
            'project' => [
                'class' => 'frontend\modules\project\Project',
            ],
            'hospital' =>[
                'class' => 'frontend\modules\hospital\hospital',
            ],
            'firstapi' =>[
                'class'=> 'frontend\modules\firstapi\firstApi',
            ],
            'api' => [
            'class' => 'frontend\modules\api\Api',
            ],
            'myapi' => [
                'class' => 'frontend\modules\myapi\myApi',  
            ],
        ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => true,
        //     'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        // ],
        'user' => [
            'identityClass' => 'common\models\Post',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                 ['class' => 'yii\rest\UrlRule', 'controller' => ['myapi/person'],'pluralize'=>false],
                 
            ],
        ],


        'ourcomponent' => [
            'class' => 'app\components\OurComponent',
        ],
          
        
    ],
    'params' => $params,
];
