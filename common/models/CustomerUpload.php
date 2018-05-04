<?php

namespace common\models;

use Yii;
use common\models\CustomerUploadDetails;

/**
 * This is the model class for table "customer_upload".
 *
 * @property integer $id
 * @property string $date_uploaded
 * @property string $remarks
 */
class CustomerUpload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $file;

    public static function tableName()
    {
        return 'customer_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_uploaded', 'remarks'], 'required'],
            [['date_uploaded'], 'safe'],
            [['remarks'], 'string'],
            [['file'],'file','skipOnEmpty'=>false, 'mimeTypes'=>'application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
               'wrongMimeType'=>'Invalid file format. Please use .xls or .xlsx',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_uploaded' => 'Date',
            'remarks' => 'Remarks',
            'file'=>'Import File',
        ];
    }

    public function upload(){
      $filename = $this->file->name;
      $this->file->saveAs(Yii::getAlias('@customer_upload').'/'.$filename);
      return $filename;
    }

  public function importExcel($filename){
    $inputFile = Yii::getAlias('@customer_upload').'/'.$filename;
    try {
      $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
      $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
      $objPHPExcel = $objReader->load($inputFile);
    } catch (Exception $e) {
      die('Error');
    }

    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

    for ($row=2; $row<=$highestRow ; $row++) {
      $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
      $code = $rowData[0][0];
      $data = CustomerUploadDetails::find()->where(['member_code'=>$code])->one();
      if (!empty($data)) {
        $details = $data;
      }else{
        $details = new CustomerUploadDetails();
      }

      $details->member_code =  $rowData[0][0];
      $details->nric = $rowData[0][1];
      $details->customer_name = $rowData[0][2];
      $details->address =$rowData[0][3];
      $details->address1 = $rowData[0][4];
      $details->address2 = $rowData[0][5];
      $details->country = $rowData[0][6];
      $details->zipcode = $rowData[0][7];
      $details->email = $rowData[0][8];
      $details->mobile_no = $rowData[0][11];
      $details->active = $rowData[0][18];
      $details->date_of_birth = date('Y-m-d',strtotime($rowData[0][21]));
      $details->details = $rowData[0][22];
      $details->save(false);
    }

  }
}
