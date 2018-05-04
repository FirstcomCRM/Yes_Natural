<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use api\modules\v1\models\Customer;
//use common\models\CustomerUploadDetails;
//use api\modules\v1\models\Customer;

class CustomerController extends ActiveController
{

//  public $modelClass = 'api\modules\v1\models\Customer';
  public $modelClass =  'common\models\CustomerUploadDetails';

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
  //Fetch: retrieve a customer data using the CRM id
  public function actionFetch($id){
  //  $data = CustomerUploadDetails::find()->where(['id'=>$id])->asArray()->one();
    $data = Customer::find()->where(['id'=>$id])->asArray()->one();
    if (!empty($data)) {
      return array('status'=>'success','data'=>$data);
    //  return $data;
    }else{
      return array('status'=>false,'data'=> 'No customer/s found');
    }
  }

  //Fetch: retrieve a customer data using the CRM member_code
  public function actionFetchCode($member_code){
  //  $data = CustomerUploadDetails::find()->where(['member_code'=>$member_code])->asArray()->one();
    $data = Customer::find()->where(['member_code'=>$member_code])->asArray()->one();
    if (!empty($data)) {
      return array('status'=>'success','data'=>$data);
    //  return $data;
    }else{
      return array('status'=>false,'data'=> 'No customer/s found');
    }
  }

  //replaces the yii2 create function;
  public function actionNew(){
  //  $model =  new CustomerUploadDetails();
    $model =  new Customer();
    $model->attributes = \yii::$app->request->post();
    if ($model->validate() ) {
      $model->save();
      return array('status'=>true,'message'=>'Customer successfully created', 'data'=>$model->attributes);
    }else{
      return array('status'=>false, 'data'=>$model->getErrors());
    }
  }

  //Edit: Update a customer information using the CRM id
  public function actionEdit($id){
    //$model = CustomerUploadDetails::find()->where(['id'=>$id])->one();
    $model = Customer::find()->where(['id'=>$id])->one();
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

  //Edit: Update a customer information using the CRM member code
  public function actionEditCode($member_code){
  //  $model = CustomerUploadDetails::find()->where(['member_code'=>$member_code])->one();
    $model = Customer::find()->where(['member_code'=>$member_code])->one();
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
  //Remove: Delete a customer's data using CRM id
  public function actionRemove($id){
    //$model =CustomerUploadDetails::find()->where(['id'=>$id])->one();
    $model =Customer::find()->where(['id'=>$id])->one();
    $model->delete();
    return array('status'=>true, 'message'=>'Customer successfully deleted');
  }

  //Remove: Delete a customer's data using CRM member_code
  public function actionRemoveCode($member_code){
  //  $model =CustomerUploadDetails::find()->where(['member_code'=>$member_code])->one();
    $model =Customer::find()->where(['member_code'=>$member_code])->one();
    $model->delete();
    return array('status'=>true, 'message'=>'Customer successfully deleted');
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
    //  $data = CustomerUploadDetails::find();
      $data = Customer::find();
  //    return $data;
    }elseif (is_null($date_created_end) ) {
      //$data = CustomerUploadDetails::find()->where(['date_created'=>$date_created_start]);
      $data = Customer::find()->where(['date_created'=>$date_created_start]);
      if (!empty($data) ) {
      //    return $data;
      }else{
        return array('status'=>false,'data'=> 'No customer/s found');
      }
    }else{
      //  $data = CustomerUploadDetails::find()->where(['between','date_created',$date_created_start,$date_created_end]);
        $data = Customer::find()->where(['between','date_created',$date_created_start,$date_created_end]);
        if (!empty($data) ) {
        //    return $data;
        }else{
            return array('status'=>false,'data'=> 'No customer/s found');
        }

    }

    $dataProvider = new ActiveDataProvider([
        'query' => $data,
        'pagination'=>[
          'pageSize'=>50,
       ],

     ]);

    return $dataProvider;
    // insert here??
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
    //  $data = CustomerUploadDetails::find()->where(['isupdate'=>$isupdate])->all();
      $data = Customer::find()->where(['isupdate'=>$isupdate])->all();
      return $data;
    }elseif(is_null($date_created_end) ){
    //  $data = CustomerUploadDetails::find()->where(['date_created'=>$date_created_start, 'isupdate'=>$isupdate])->all();
      $data = Customer::find()->where(['date_created'=>$date_created_start, 'isupdate'=>$isupdate])->all();
      if (!empty($data) ) {
        return $data;
      }else{
        return array('status'=>false,'data'=> 'No customer/s found');
      }
    }else{
    //  $data = CustomerUploadDetails::find()->where(['between','date_created',$date_created_start,$date_created_end])
      $data = Customer::find()->where(['between','date_created',$date_created_start,$date_created_end])
            ->andWhere(['isupdate'=>$isupdate])
            ->all();
      if (!empty($data) ) {
        return $data;
      }else{
        return array('status'=>false,'data'=> 'No customer/s found');
      }
    }

    //insert here??

  }

  public function actionIsupdate(){
    //$data = CustomerUploadDetails::find()->where(['isupdate'=>1])->all();
    $data = Customer::find()->where(['isupdate'=>1])->all();
    if (!empty($data) ) {
      return $data;
        //return gettype($data);
    }else{
      return array('status'=>false,'data'=> 'No customer/s found');
    }
  }

  public function actionTesting($nric){
    //  return $modelClass;
    $data = CustomerUploadDetails::find();

    $dataProvider = new ActiveDataProvider([
        'query' => $data,
        'pagination'=>[
          'pageSize'=>50,
       ],

     ]);
    return array('status'=>'true', 'message'=>'Records Found', 'data'=>$dataProvider->getModels());
  //  return array('status'=>'true', 'message'=>'Records Found', 'data'=>$dataProvider->query->all());
    //  return array($dataProvider);
    //ini_set('max_execution_time', 180);
    //ini_set("memory_limit", "512M");
    //$data = CustomerUploadDetails::find()->all();
//    return $nric;
  //  return $data;
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
