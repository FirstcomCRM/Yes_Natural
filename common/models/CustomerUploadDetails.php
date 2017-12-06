<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "customer_upload_details".
 *
 * @property integer $id
 * @property string $customer_name
 * @property string $nric
 * @property string $mobile_no
 * @property string $email
 * @property string $address
 * @property string $date_of_birth
 * @property string $details
 * @property integer $customer_upload_id
 * @property string $date_uploaded
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $date_created
 * @property string $date_modified
 */
class CustomerUploadDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     public function behaviors(){
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'modified_by',
            ],
            [
              'class' => TimestampBehavior::className(),
              'createdAtAttribute' => 'date_created',
              'updatedAtAttribute' => 'date_modified',
            //  'value' => new Expression('NOW()'),
                'value' => date('Y-m-d'),
            ],
        ];
     }

    public static function tableName()
    {
        return 'customer_upload_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'mobile_no', 'date_of_birth'], 'required'],
            [['address', 'details'], 'string'],
            [['email'],'email'],
            [['date_of_birth', 'date_uploaded', 'date_created', 'date_modified'], 'safe'],
            [['customer_upload_id', 'created_by', 'modified_by'], 'integer'],
            [['customer_name', 'email'], 'string', 'max' => 75],
            [['nric'], 'string', 'max' => 12],
            [['mobile_no'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'nric' => 'Nric',
            'mobile_no' => 'Mobile No',
            'email' => 'Email',
            'address' => 'Address',
            'date_of_birth' => 'Date Of Birth',
            'details' => 'Details',
            'customer_upload_id' => 'Customer Upload ID',
            'date_uploaded' => 'Date Uploaded',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }
}
