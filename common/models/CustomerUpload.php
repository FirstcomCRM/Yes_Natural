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

    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
      $highestRow = $worksheet->getHighestRow();
      for ($row=2; $row <= $highestRow ; $row++) {
        $details = new CustomerUploadDetails();
        $details->customer_upload_id = $this->id;
        $details->date_uploaded = $this->date_uploaded;
        $details->customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
        $details->nric = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $details->mobile_no = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $details->email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $details->address = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
      //  $details->date_of_birth = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
         $details->date_of_birth = date('Y-m-d',strtotime($worksheet->getCellByColumnAndRow(5, $row)->getFormattedValue()) );
        $details->details =$worksheet->getCellByColumnAndRow(6, $row)->getValue();
        $details->save(false);
      }
    }

  }
}
