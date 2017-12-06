<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\CustomerUploadDetails;
//use api\modules\v1\models\Customer;

class CustomerController extends ActiveController
{

  public $modelClass = 'api\modules\v1\models\Customer';

  /*public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
              //  'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }*/

  public function actionTest()
  {
      //  $test = CustomerUploadDetails::find()->where(['customer_name'=>$id])->one();
      //  print_r($id);die();
      //  $test = CustomerUploadDetails::find()->where(['customer_name'=>$customer_name])->one();
    //  return CustomerUploadDetails::findOne(1);
    //    $test  =CustomerUploadDetails::find()->all();
      //  return $test;
      $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
      return json_encode($arr);
      //return json_encode(['status'=>'clear','test'=>'tests']);
    //    return "1111";
  }
}
