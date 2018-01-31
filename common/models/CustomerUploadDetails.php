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
            [['customer_name', 'mobile_no', 'date_of_birth','nric','member_code'], 'required'],
            [['address', 'details','address1','address2'], 'string'],
            [['email'],'email'],
            [['date_of_birth', 'card_expiry_date', 'date_created', 'date_modified'], 'safe'],
            [['created_by', 'modified_by','active'], 'integer'],
            [['customer_name', 'email'], 'string', 'max' => 75],
            [['country'],'string','max'=>50],
            [['zipcode'],'string','max'=>25],
            [['sex'],'string','max'=>20],
            [['nric'], 'string', 'max' => 12],
            [['nric','member_code'],'unique'],
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
            'member_code'=>'Member Code',
            'customer_name' => 'Customer Name',
            'nric' => 'Nric',
            'mobile_no' => 'Mobile No',
            'email' => 'Email',
            'address' => 'Address 1',
            'address1'=>'Address 2',
            'address2'=>'Address 3',
            'zipcode'=>'Zip Code',
            'country'=>'Country',
            'card_expiry_date'=>'Card Expiry Date',
            'active'=>'Active',
            'date_of_birth' => 'Date Of Birth',
            'details' => 'Remarks',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }


}
