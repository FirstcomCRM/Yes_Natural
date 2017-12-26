<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Response;
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

  public function actions(){
    $actions = parent::actions();
    unset($actions['view']);
    unset($actions['index']);
    unset($actions['create']);
    unset($actions['update']);
    return $actions;
  }

  //edr custom API functions

  //replaces the yii2 view function
  public function actionFetch($id){
    $data = CustomerUploadDetails::find()->where(['id'=>$id])->asArray()->all();
    if (!empty($data)) {
      return array('status'=>'success','data'=>$data);
    //  return $data;
    }else{
      return array('status'=>false,'data'=> 'No customer/s found');
    }
  }

  //replaces the yii2 create function;
  public function actionNew(){
    $model =  new CustomerUploadDetails();
    $model->attributes = \yii::$app->request->post();
    if ($model->validate() ) {
      $model->save();
      return array('status'=>true,'message'=>'Customer successfully created', 'data'=>$model->attributes);
    }else{
      return array('status'=>false, 'data'=>$model->getErrors());
    }
  }

  public function actionEdit($id){
    $model = CustomerUploadDetails::find()->where(['id'=>$id])->one();
    if (!empty($model) ) {
        if ($model->validate() ) {
           $model->attributes = \yii::$app->request->post();
           $model->save();
           return array('status'=>true, 'message'=>'Update success', 'data'=>$model->attributes);
        }else{
            return array('status'=>false, 'data'=>$model->getErrors());
        }
    }else{
      return array('status'=>false,'data'=> 'No customer/s found');
    }
  }

  //replaces the yii2 delete function
  public function actionRemove($id){
    $model =CustomerUploadDetails::find()->where(['id'=>$id])->one();
    $model->delete();
    return array('status'=>'success', 'message'=>'Customer successfully deleted');
  }

  //additional HTTP GET methods
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
        //return gettype($data);
    }else{
      return array('status'=>false,'data'=> 'No customer/s found');
    }
  }

  public function actionTesting($nric){
    //  return $modelClass;
    return $nric;
    /*  $data = CustomerUploadDetails::find()->where(['date_created'=>$dates]);
      if (!empty($data) ) {
        return $data;
      }else{
        return array('status' => true, 'data'=> 'Student record is successfully updated');
       return array('status'=>false,'data'=>$student->getErrors());
       return array('status'=>false,'data'=> 'No Student Found');
     }*/
     //return 'test';
  }

}
