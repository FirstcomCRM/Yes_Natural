<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_upload_details".
 *
 * @property integer $id
 * @property string $ic_no
 * @property integer $phone_no
 * @property string $email_id
 * @property string $address
 * @property integer $customer_upload_id
 * @property string $date_uploaded
 */
class CustomerUploadDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

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
          //  [['ic_no', 'phone_no', 'email_id', 'address', 'customer_upload_id', 'date_uploaded'], 'required'],
            [['phone_no', 'customer_upload_id'], 'integer'],
            [['address'], 'string'],
            [['date_uploaded'], 'safe'],
            [['ic_no'], 'string', 'max' => 12],
            [['email_id'],'email'],
            [['email_id'], 'string', 'max' => 75],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ic_no' => 'IC No',
            'phone_no' => 'Phone No',
            'email_id' => 'Email',
            'address' => 'Address',
            'customer_upload_id' => 'Customer Upload ID',
            'date_uploaded' => 'Date Uploaded',

        ];
    }
}
