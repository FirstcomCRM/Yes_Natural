<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\CustomerUploadDetails;
//use api\modules\v1\models\Customer;

class CustomerController extends ActiveController
{

  public $modelClass = 'api\modules\v1\models\Customer';

  public function behaviors()
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
    }

  public function actionDate($date_created_start = null,$date_created_end = null)
  {

    if ($date_created_start == '') {
        $date_created_start = null;
    }

    if ($date_created_end == '') {
        $date_created_end = null;
    }

    if (is_null($date_created_start) && is_null($date_created_end) ) {
      $data = CustomerUploadDetails::find()->all();
      return $data;
    }elseif (is_null($date_created_end) ) {
      $data = CustomerUploadDetails::find()->where(['date_created'=>$date_created_start])->all();
      if (!empty($data) ) {
          return $data;
      }else{
        return array('status'=>false,'data'=> 'No customer/s found');
      }
    }else{
        $data = CustomerUploadDetails::find()->where(['between','date_created',$date_created_start,$date_created_end])->all();
        if (!empty($data) ) {
            return $data;
        }else{
            return array('status'=>false,'data'=> 'No customer/s found');
        }

    }
    //  return json_encode(['status'=>false,'data'=> 'No customer found']);
  }

  public function actionDateup($date_created_start = null,$date_created_end = null, $isupdate=0){
    if ($isupdate == '') {
       $isupdate = 0;
    }

    if ($date_created_start == '') {
        $date_created_start = null;
    }

    if ($date_created_end == '') {
        $date_created_end = null;
    }


    if (is_null($date_created_start) && is_null($date_created_end) ) {
      $data = CustomerUploadDetails::find()->where(['isupdate'=>$isupdate])->all();
      return $data;
    }elseif(is_null($date_created_end) ){
      $data = CustomerUploadDetails::find()->where(['date_created'=>$date_created_start, 'isupdate'=>$isupdate])->all();
      if (!empty($data) ) {
        return $data;
      }else{
        return array('status'=>false,'data'=> 'No customer/s found');
      }
    }else{
      $data = CustomerUploadDetails::find()->where(['between','date_created',$date_created_start,$date_created_end])
            ->andWhere(['isupdate'=>$isupdate])
            ->all();
      if (!empty($data) ) {
        return $data;
      }else{
        return array('status'=>false,'data'=> 'No customer/s found');
      }
    }

  }

  public function actionIsupdate(){
    $data = CustomerUploadDetails::find()->where(['isupdate'=>1])->all();
    if (!empty($data) ) {
      return $data;
    }else{
      return array('status'=>false,'data'=> 'No customer/s found');
    }
  }


  public function actionDatetesting($dates){
      $data = CustomerUploadDetails::find()->where(['date_created'=>$dates]);
      if (!empty($data) ) {
        return $data;
      }else{
        return array('status' => true, 'data'=> 'Student record is successfully updated');
       return array('status'=>false,'data'=>$student->getErrors());
       return array('status'=>false,'data'=> 'No Student Found');
      }
  }

}
