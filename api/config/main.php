<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => '@app\modules\v1\controllers',
  //  'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
      'v1'=>[
        'basePath'=>'@app/modules/v1',
        'class'=>'api\modules\v1\Module',
      ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
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
        'request' => [
          'parsers' => [
            'application/json' => 'yii\web\JsonParser',
          ]
        ],
        'response' => [
          'class' => 'yii\web\Response',
        ],
        'urlManager' => [
        //    'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
              [
                'class'=>'yii\rest\UrlRule',
                'controller'=>'v1/customer',
                'extraPatterns' => [
              //    'GET customers/<id>' => 'customer/test',
                //  'GET {customer_name}' => 'test',
                //  'GET test'=>'test',
                  'GET date'=>'date',
                  'GET dateup'=>'dateup',
                  'GET isupdate'=>'isupdate', 
                  //'POST test' => 'test',
                ],
                'tokens' => [
                    '{id}' => '<id:\\w+>',
                    '{customer_name}' => '<customer_name:\\w+>'

                ],
              ],

            ],
        ],

    ],

    'params' => $params,
];
